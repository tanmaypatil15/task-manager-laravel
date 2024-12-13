<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        
        return view('backend.dashboard', compact('todos'));
    }      

    public function create() {
        return view("frontend.create");
    }


    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'completed' => 'boolean',
        ]);

        Todo::create($validatedData);

        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }


    // Update the specified todo in storage
    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'completed' => 'boolean',
        ]);

        $todo->update($validatedData);

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }







}
