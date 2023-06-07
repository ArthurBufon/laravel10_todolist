@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('header', 'Listando Tarefas')

@section('content')
<a href="{{ route('task_create') }}" class="btn bg-purple">+ Nova Tarefa</a>
    <div class="row">
        <div class="col-md-5" style="margin:auto">
            @foreach ($tasks as $task)
                <div class="card">
                    <div class="card-header bg-purple">{{$task->titulo}}</div>
                    <div class="card-body">{{$task->descricao}}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
