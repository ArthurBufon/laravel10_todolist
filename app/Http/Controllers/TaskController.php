<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // LISTA TAREFAS
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // CRIAR TAREFA
    public function create()
    {
        return view('tasks.form');
    }

    // SALVA TAREFA
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

        $task = Task::find($request['task_id']);

        if (!$task) {
            Task::create($input);
        } else {
            $task->titulo = $request['titulo'];
            $task->descricao = $request['descricao'];

            $task->update();
        }

        return redirect()->route('dashboard');
    }

    // FORM EDIT TAREFA
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.form', compact('task'));
    }

    // DELETE TAREFA
    public function delete($id)
    {
        $task = Task::find($id);

        if(!$task){
            return redirect()->back();
        }
        Task::destroy($id);

        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }
}
