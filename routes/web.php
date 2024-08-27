<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route to display a list of tasks
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Route to show the form for creating a new task
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Route to store a newly created task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Route to show the form for editing an existing task
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Route to update an existing task
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// Route to delete an existing task
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
