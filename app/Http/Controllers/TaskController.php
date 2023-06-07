<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.form');
    }

    public function store(Request $request)
    {
        $input = $request->validate(
            [
                'titulo' => ['required', 'max:200'],
                'descricao' => ['required', 'max:200'],
            ],
            [
                'titulo.required' => 'Título é obrigatório!',
                'titulo.descricao' => 'Descrição é obrigatória!',
            ]
        );

        Task::create($input);

        return redirect()->route('dashboard');
    }
}
