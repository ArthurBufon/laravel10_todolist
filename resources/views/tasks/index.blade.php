@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('header', 'Listando Tarefas')

@section('content')
    <a href="{{ route('task_create') }}" class="btn bg-purple mb-3"><span class="fa fa-plus-circle"></span> Nova Tarefa</a>
    <button id="get_tasks" onclick="get_tasks()" style="display: none"></button>

    <div class="row" id="#tasks">
        {{-- IMPORTANTE --}}
        <div class="col-md-4" id="div_importantes">
            <div class="card">
                <div class="card-header bg-purple"><span class="fa fa-star mr-2"></span>Importante</div>
                <div class="card-body" style="overflow-y: scroll; height: 420px;">
                    Lista Vazia!
                </div>
            </div>
        </div>

        {{-- PENDENTE --}}
        <div class="col-md-4" id="div_pendentes">
            <div class="card">
                <div class="card-header bg-dark"><span class="fa fa-clock mr-2"></span>Pendente</div>
                <div class="card-body" style="overflow-y: scroll; height: 420px;">
                    Lista Vazia!
                </div>
            </div>
        </div>

        {{-- CONCLUIDO --}}
        <div class="col-md-4" id="div_concluidas">
            <div class="card">
                <div class="card-header" style="background-color: rgb(38, 205, 38); color:white;"><span class="fa fa-check mr-2"></span>Concluído</div>
                <div class="card-body" style="overflow-y: scroll; height: 420px;">
                    Lista Vazia!
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('#get_tasks').trigger('click');


        });

        function get_tasks() {
            //carrega tarefas importantes
            $.ajax({
                url: "{{ url('/get_tasks') }}",
                type: 'get',
                success: function(retorno) {
                    //3 cards e passar os 3 itens do array retorno
                    $('#div_importantes').html(retorno.importantes);
                    $('#div_pendentes').html(retorno.pendentes);
                    $('#div_concluidas').html(retorno.concluidas);
                }
            });
        }

        function excluir(id) {
            if (confirm("Confirma a exclusão do recibo?")) {
                event.preventDefault();
                $.ajax({
                    url: '{{ url('/task/delete') }}',
                    type: 'post',
                    data: {
                        '_token': $('meta[name=csrf-token]').attr('content'),
                        id: id
                    },
                    success: function(response) {
                        $('#tasks').html(response);
                        toastr.success("Dados deletados com sucesso");
                    }
                });
            }
        }
    </script>
@endsection
