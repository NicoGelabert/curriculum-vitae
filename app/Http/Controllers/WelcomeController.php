<?php

namespace App\Http\Controllers;

use App\Models\HomeHeroBanner;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Feature;
use App\Models\Service;
use App\Models\Project;
use App\Models\Client;
use App\Models\Faq;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $homeherobanners = HomeHeroBanner::all();
        $experiences = Experience::orderBy('id', 'desc')->get();
        $educations = Education::orderBy('id', 'desc')->get();
        $skills = Skill::all();
        $features = Feature::all();
        $services = Service::all();
        $clients = Client::all();
        $projects = Project::with('tags', 'clients')->get();
        $faqs = Faq::all();
        return view('welcome', compact(
            'homeherobanners',
            'experiences',
            'educations',
            'skills',
            'features',
            'services',
            'clients',
            'projects',
            'faqs'
        ));
    }
}
