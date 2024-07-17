<?php

namespace App\Http\Controllers;

use App\Models\Service;
// use App\Models\ServiceItem;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // $services = Service::with('attributes')->get();
        // return response()->json($services);
        $services = Service::with('attributes')->get();
        return view('services', compact('services'));
    }

    public function view(Service $service)
    {
        // // $service_portfolios = $service->serviceItems()->with('portfolios.client', 'portfolios.serviceItems')->get()->pluck('portfolios')->flatten()->unique('id');
        
        // // Obtenemos todos los Attributes y carga la relación con Service
        // $srvAttributes = Attributes::with('service')->get();
        // // Agrupamos los Attributes por el servicio
        // $groupedSrvAttributes = $srvAttributes->groupBy('service_id');

        // // Obtenemos todos los ServiceItem y carga la relación con Service
        // 
        // // Agrupamos los items por el servicio
        $services = Service::all();
        $projects = Project::with('tags', 'clients')->get();
        $tags = Tag::all();
        return view('services.view', compact(
            'service',
            'projects',
            'services',
            'tags'
        )
        );
    }
}
