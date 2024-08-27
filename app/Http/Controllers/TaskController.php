<?php

namespace App\Http\Controllers;

use App\Models\Task;  // Import the Task model
use Illuminate\Http\Request;

class TaskController extends Controller
{
   // app/Http/Controllers/TaskController.php
public function index()
{
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
}

public function create()
{
    return view('tasks.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    Task::create($validatedData);

    return redirect()->route('tasks.index');
}

public function edit($id)
{
    $task = Task::findOrFail($id);
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $task->update($validatedData);

    return redirect()->route('tasks.index');
}

public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->route('tasks.index');
}

}
