<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function show(Request $request, $id)
    {
        $projectsJson = File::get(storage_path('data/projects.json'));
        $projectData  = json_decode($projectsJson, true);

        $project = null;
        foreach ($projectData as $data) {
            if ($data['id'] == $id) {
                $project = $data;
                break;
            }
        }
        return view('projects.show', compact('project'));
    }
}
