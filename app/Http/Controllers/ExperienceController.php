<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('id', 'desc')->get();
        return view('components.experience', [
            'experiences' => $experiences
        ]);
    }
}
