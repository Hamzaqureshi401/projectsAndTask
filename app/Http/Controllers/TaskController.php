<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use validate;

class TaskController extends Controller
{
    public function createTask(){
   
        $projects = Project::all();
        if ($projects->isEmpty()) {
            return redirect()->route('projects.create')->with('error' , 'Add Project First!');
        }

        return view('tasks.createTask', compact('projects'));
    }

    public function storeTasks(Request $request){
   
        $validatedData = $request->validate([
            'task_name' => 'required|max:255',
            'priority' => 'required|integer|unique:tasks',
            'project_id' => 'required|exists:projects,id'
        ]);
        $task = Task::create($validatedData);
        return redirect()->route('create.task')->with('success', 'Task created successfully!');
    }

    public function allTasks(){
   
        $tasks = Task::orderBy('priority' , 'asc')->get();
        return view('tasks.allTasks', compact('tasks'));
    }

    public function editTask(Task $task){
       
        $projects = Project::all();
        return view('tasks.editTask', compact('task' , 'projects'));
    }
    public function updateTask(Request $request, Task $task){

        $validatedData = $request->validate([
            'task_name' => 'required|max:255',
            'priority' => 'required|integer',
            'project_id' => 'required|exists:projects,id'
        ]);

        $task->update($validatedData);

        return redirect()->route('allTasks')->with('success', 'Task updated successfully!');
    }

    public function deleteTask(Task $task){
        $task->delete();
        return redirect()->back()->with('success', 'Task Deleted successfully!');
    }
    public function reOrderTasks(Request $request){
    
        $changedRowIds = $request->changedRowIds;

        foreach ($changedRowIds as $taskId) {
            $task = Task::findOrFail($taskId);
            $taskIds[] = $taskId;
            $proiority[] = $task->priority;
        }
        $task = Task::findOrFail($taskIds[0]);
        $task->priority = $proiority[1];
        $task->save();
        $task = Task::findOrFail($taskIds[1]);
        $task->priority = $proiority[0];
        $task->save();

        return response()->json(['message' => 'Priorities updated successfully.']);
    }


}
