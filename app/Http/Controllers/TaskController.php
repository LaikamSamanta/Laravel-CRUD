<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Gate;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get(); // Fetch only tasks that belong to the authenticated user
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Lūdzu, ielogojieties, lai izveidotu jaunu uzdevumu.');
        }
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {

        $task = Task::create([
    ...$request->validated(),
    'user_id' => auth()->id(),
]);

    // Notify the user about the new task
    auth()->user()->notify(new \App\Notifications\TaskPublished($task));

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        Gate::authorize('update', $task); // This will check if the user has permission to view this specific task using the TaskPolicy
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        Gate::authorize('update', $task); // This will check if the user has permission to edit this specific task using the TaskPolicy
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        // $request->validate([
        //    'title' => 'required|string|max:255',
        //    'description' => 'nullable|string',
        //    'completed' => 'boolean',
        // ]);

        Gate::authorize('update', $task); // This will check if the user has permission to update this specific task using the TaskPolicy

        $task->update($request->validated());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        Gate::authorize('update', $task); // This will check if the user has permission to delete this specific task using the TaskPolicy
        
        $task->delete();
        return redirect()->route('tasks.index');
    }
}