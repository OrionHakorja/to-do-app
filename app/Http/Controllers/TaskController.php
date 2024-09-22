<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        // show view of task creation page
        return view('tasks.create');
    }

    public function store(Request $request, Task $task)
    {
        // validate the data
        $data = $request->validate([
           'name' => 'required',
           'description' => 'required',
           'priority' => 'required',
           'expires_at' => 'required'
        ]);
        //Create new task
        $task->create($data);
        //Return to homepage
        return redirect()->route('welcome');
    }

    public function edit($id)
    {
        //find the task we want to edit
        $task = Task::findOrFail($id);
        //return the edit view
        return view('tasks.edit')->with([
           'task' => $task
        ]);
    }

    public function update(Request $request,$id)
    {
        //Find the task we want to edit
        $task = Task::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'expires_at' => 'required'
        ]);
        //Update the task
        $task->update($data);
        //Redirect to the homepage
        return redirect()->route('welcome');
    }

    public function delete($id)
    {
        //Find the task we want to delete
        $task = Task::findOrFail($id);
        //Delete the task
        $task->delete();
        //Redirect to the homepage
        return redirect()->route('welcome');
    }

    public function search(Request $request)
    {
        // Retrieve the 'search' input from the request
        $search = $request->input('search');

        // Search the fields using the LIKE operator
        $tasks = Task::query()
            ->where('name', 'LIKE' ,"%$search%")
            ->orWhere('id', 'LIKE', "%$search%")
        ->orWhere('description', 'LIKE', "%$search%")
            ->orWhere('priority', 'LIKE', "%$search%")
            ->get();

        // Return the welcome view with only the searched fields
        return view('welcome', compact('tasks'));
    }
}
