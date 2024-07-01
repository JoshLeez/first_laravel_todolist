<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{

    public function index()
    {   
        $todos = Todo::all();
        foreach($todos as $todo){
            $todo->status = $todo->completed ? "Completed" : "Not Completed";
        }
        return view('todos.index', compact('todos'));
    }
    
    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request): RedirectResponse
    {


        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('todo.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id){
        
        $todo = Todo::findOrFail($id);

        return view('todo.edit', compact("todo"));
    }

    public function update(Request $request, $id): RedirectResponse{

        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'completed' => 'required'
        ]);

        $todo = Todo::FindOrFail($id);

        return redirect()->route('todo.index')->with(['success' => 'Data Berhasil Diupdate']);
    } 
}
