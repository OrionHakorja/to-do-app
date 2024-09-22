<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // show all tasks
    $tasks = Task::all();
    return view('welcome')->with([
        'tasks' => $tasks
    ]);
})->name('welcome');

Route::get('/tasks-create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks-create', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks-edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks-edit/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks-delete/{task}',[TaskController::class, 'delete'])->name('tasks.delete');
Route::get('/search', [TaskController::class, 'search'])->name('tasks.search');
