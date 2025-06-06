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
        $experiencesJson = $experiences->map(function ($experience) {
            return [
                'title' => $experience->title,
                'description' => $experience->description,
                'site' => $experience->site,
                'timelapse' => $experience->timelapse,
                'image' => $experience->image,
                'company' => $experience->company,
            ];
        })->values();
        $educations = Education::orderBy('id', 'desc')->get();
        $educationsJson = $educations->map(function ($education) {
            return [
                'title' => $education->title,
                'description' => $education->description,
                'site' => $education->site,
                'timelapse' => $education->timelapse,
                'image' => $education->image,
                'school' => $education->school,
                'certificate' => $education->certificate,
            ];
        })->values();
        $skills = Skill::all();
        $features = Feature::all();
        $services = Service::all();
        $clients = Client::all();
        $projects = Project::with('tags', 'clients')->get();
        $faqs = Faq::all();
        return view('welcome', compact(
            'homeherobanners',
            'experiences',
            'experiencesJson',
            'educations',
            'educationsJson',
            'skills',
            'features',
            'services',
            'clients',
            'projects',
            'faqs'
        ));
    }
}
