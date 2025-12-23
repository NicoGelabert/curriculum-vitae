<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Events\ContactCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmation;
use App\Mail\AdminNotificationMail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|string',
            'captcha' => 'required'
        ]);

        // 🧪 Verificación con Google
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->captcha
            ]
        );

        if (! $response->json('success')) {
            return response()->json([
                'message' => 'Captcha inválido'
            ], 422);
        }

        // 🗃️ Guardar contacto
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        try {
            Mail::to($contact->email)->send(new ContactConfirmation($contact));
            Mail::to(config('mail.from.address'))->send(new AdminNotificationMail($contact));

            return response()->json(['message' => 'Mensaje Enviado!'], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Falló el envío. Por favor intente en unos minutos.'
            ], 500);
        }
    }

}
