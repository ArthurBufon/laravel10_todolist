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

        if (!$task) {
            return redirect()->back();
        }
        Task::destroy($id);

        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    // LISTA TAREFAS
    public function list()
    {
        $tasks = Task::all();

        $pendentes = '';
        $importantes = '';

        foreach ($tasks as $task) {
            if(($task->pendente === 1) && ($task->importante === 1)){
                $importantes .=
                '<div class="card">'
                    . '<div class="card-header bg-purple">'
                        . '<div class="row">'
                            . '<span class="col-md-6"> ' . $task->titulo . ' </span>'
                            . '<span class="col-md-6">'
                            . '<button type="button" class="btn btn-sm" style="color:white; float:right;">'
                            . '<span class=" fa fa-trash"></span>'
                            . '</button>'
                            . '<a href="' . route('task_edit', ['id' => $task->id]) . '" style="color:white; float:right;"><span class="btn-sm fa fa-pen ml-2"></span></a>'
                            . '</span>'
                        . '</div>'
                    . '</div>'
                    . '<div class="card-body">' . $task->descricao . '</div>'
                . '</div>';
            }
        }

        // tarefas importantes
        $tarefas_importantes =
        '<div class="card">'
            . '<div class="card-header bg-purple"><span class="fa fa-star mr-2"></span>Importante</div>'
            . '<div class="card-body" style="overflow-y: scroll; height: 420px;">'
                . $importantes
            . '</div>'
        . '</div>';

        $retorno['importantes'] = $tarefas_importantes;

        return $retorno;
    }
}
