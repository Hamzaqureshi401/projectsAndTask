<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/projects/create');
    //return view('welcome');
});

Route::get('allProjects', [ProjectController::class, 'allProjects']);
Route::get('/project/tasks/{projectId}', [ProjectController::class, 'showTasks'])->name('project.tasks');

Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store']);

Route::get('/createTask', [TaskController::class, 'createTask'])->name('create.task');
Route::post('/storeTasks', [TaskController::class, 'storeTasks'])->name('tasks.store');
Route::get('/allTasks', [TaskController::class, 'allTasks'])->name('allTasks');
Route::get('/editTasks/{task}', [TaskController::class, 'editTask'])->name('editTask');
Route::post('/updateTask/{task}', [TaskController::class, 'updateTask'])->name('updateTask');
Route::delete('/deleteTask/{task}', [TaskController::class, 'deleteTask'])->name('deleteTask');
Route::post('/reOrderTask', [TaskController::class, 'reOrderTasks']);



