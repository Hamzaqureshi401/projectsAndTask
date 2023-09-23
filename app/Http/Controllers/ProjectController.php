<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use validate;

class ProjectController extends Controller
{
    public function allProjects(){
        $projects = Project::all();
        return view('projects.allProjects', compact('projects'));
    }
    public function showTasks($projectId){
        $tasks = Task::where('project_id' , $projectId)->orderBy('priority' , 'asc')->get();
        return view('tasks.allTasks', compact('tasks'));
    }


    public function create(){
        return view('projects.createProject');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

    //dd($request->all());
        Project::create($validatedData);

        return redirect('/projects/create')->with('success', 'Project added successfully!');
    }
}
