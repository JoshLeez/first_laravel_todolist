<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    //
    public function create(): View
    {
        $todos = Todo::all();
        return view('todos.create', compact('todos'));
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

        return redirect()->route('todo.create')->with(['success' => 'Data Berhasil Disimpan']);
    }

}
