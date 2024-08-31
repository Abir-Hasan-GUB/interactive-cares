<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request){
        $headerInfo = json_decode(File::get(storage_path('data/header.json')), true)[0];
        $aboutMe = json_decode(File::get(storage_path('data/aboutMe.json')), true)[0];
        return view('pages.home', compact('headerInfo', 'aboutMe'));
    }

    public function resume(Request $request){
        return view('pages.resume');
    }

    public function projects(Request $request){
        $projectsJson = File::get(storage_path('data/projects.json'));
        $projects  = json_decode($projectsJson, true);

        return view('pages.projects', compact('projects'));
    }

    public function contact(Request $request){
        return view('pages.contact');
    }
}
