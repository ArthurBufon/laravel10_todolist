@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('header', 'Listando Tarefas')

@section('content')
<a href="{{ route('dashboard') }}" class="btn bg-purple mb-3"><span class="fa fa-arrow-left mr-2"></span>Voltar</a>
    <div class="row">
        <div class="col-md-5" style="margin:auto">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Nova Tarefa</h3>
                </div>
                <form method="POST" action="{{ route('task_store') }}">
                    @csrf

                    <input type="hidden" name="task_id" id="task_id" value="{{ $task->id ?? '' }}">

                    <div class="card-body">
                        {{-- TITULO --}}
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input value="{{ $task->titulo ?? '' }}" type="text" class="form-control" id="titulo"
                                name="titulo">
                        </div>
                        {{-- DESCRICAO --}}
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input value="{{ $task->descricao ?? '' }}" type="text" class="form-control" id="descricao"
                                name="descricao">
                        </div>
                        {{-- IMPORTANTE --}}
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="importante" name="importante">
                            <label class="form-check-label" for="importante">Importante</label>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn bg-purple">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
