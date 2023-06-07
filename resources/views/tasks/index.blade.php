@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('header', 'Listando Tarefas')

@section('content')
    <a href="{{ route('task_create') }}" class="btn bg-purple mb-3"><span class="fa fa-plus-circle"></span> Nova Tarefa</a>

    <div class="row">

        {{-- IMPORTANTE --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-purple"><span class="fa fa-star mr-2"></span>Importante</div>
                <div class="card-body">
                    @foreach ($tasks as $task)
                        {{-- CARD --}}
                        <div class="card">
                            <div class="card-header bg-purple">
                                <div class="row">
                                    <span class="col-md-6">{{ $task->titulo }}</span>
                                    <span class="col-md-6">
                                        <form action="{{ route('task_delete', ['id' => $task->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="color:white; float:right;">
                                                <span class=" fa fa-trash"></span>
                                            </button>
                                        </form>
                                        <a href="{{ route('task_edit', ['id' => $task->id]) }}" style="color:white; float:right;"><span class="btn-sm fa fa-pen ml-2"></span></a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">{{ $task->descricao }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- PENDENTE --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark"><span class="fa fa-clock mr-2"></span>Pendente</div>
                <div class="card-body">
                    @foreach ($tasks as $task)
                        {{-- CARD --}}
                        <div class="card">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <span class="col-md-6">{{ $task->titulo }}</span>
                                    <span class="col-md-6">
                                        <form action="{{ route('task_delete', ['id' => $task->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="color:white; float:right;">
                                                <span class=" fa fa-trash"></span>
                                            </button>
                                        </form>
                                        <a href="{{ route('task_edit', ['id' => $task->id]) }}" style="color:white; float:right;"><span class="btn-sm fa fa-pen ml-2"></span></a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">{{ $task->descricao }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- CONCLUIDO --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: rgb(38, 205, 38); color:white;"><span class="fa fa-check mr-2"></span>Concluído</div>
                <div class="card-body">
                    @foreach ($tasks as $task)
                        {{-- CARD --}}
                        <div class="card">
                            <div class="card-header" style="background-color: rgb(38, 205, 38); color:white;">
                                <div class="row">
                                    <span class="col-md-6">{{ $task->titulo }}</span>
                                    <span class="col-md-6">
                                        <form action="{{ route('task_delete', ['id' => $task->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="color:white; float:right;">
                                                <span class=" fa fa-trash"></span>
                                            </button>
                                        </form>
                                        <a href="{{ route('task_edit', ['id' => $task->id]) }}" style="color:white; float:right;"><span class="btn-sm fa fa-pen ml-2"></span></a>
                                    </span>
                                </div>


                            </div>
                            <div class="card-body">{{ $task->descricao }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
