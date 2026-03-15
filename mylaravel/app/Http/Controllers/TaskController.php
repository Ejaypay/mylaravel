<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // GET /tasks — List all tasks
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // GET /tasks/create — Show form to create a task
    public function create()
    {
        return view('tasks.create');
    }

    // POST /tasks — Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'title'        => $request->title,
            'description'  => $request->description,
            'is_completed' => false,
        ]);

        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully!');
    }

    // GET /tasks/{task} — Show a single task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // GET /tasks/{task}/edit — Show edit form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // PUT /tasks/{task} — Update a task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update([
            'title'        => $request->title,
            'description'  => $request->description,
            'is_completed' => $request->has('is_completed'),
        ]);

        return redirect()->route('tasks.index')
                         ->with('success', 'Task updated successfully!');
    }

    // DELETE /tasks/{task} — Delete a task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully!');
    }
}