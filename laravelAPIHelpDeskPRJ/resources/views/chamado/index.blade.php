@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card card-default">
                <div class="card-header text-center">
                    Chamados
                    <a class="btn btn-sm btn-success float-right" href="{{route('chamado.create')}}">Cadastrar</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formBuscarChamado" accept-charset="utf-8">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="organizacao_id">Organizações</label>
                                        <select name="organizacao_id" id="organizacao_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="departamento_id">Departamentos</label>
                                        <select name="departamento_id" id="departamento_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="servico_id">Serviços</label>
                                        <select name="servico_id" id="servico_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="chamado_categoria_id">Categorias</label>
                                        <select name="chamado_categoria_id" id="chamado_categoria_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="chamado_urgencia_id">Urgências</label>
                                        <select name="chamado_urgencia_id" id="chamado_urgencia_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="chamado_prioridade_id">Prioridades</label>
                                        <select name="chamado_prioridade_id" id="chamado_prioridade_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="chamado_situacao_id">Situações</label>
                                        <select name="chamado_situacao_id" id="chamado_situacao_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="chamado_feedback_id">Feedbacks</label>
                                        <select name="chamado_feedback_id" id="chamado_feedback_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="analista_id">Analistas</label>
                                        <select name="analista_id" id="analista_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="responsavel_id">Responsáveis</label>
                                        <select name="responsavel_id" id="responsavel_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="autor_id">Autores</label>
                                        <select name="autor_id" id="autor_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="watcher">Watchers</label>
                                        <select name="watcher" id="watcher"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="id">ID/Número</label>
                                        <input type="text" name="id" id="id" class="form-control">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="titulo">Titulo</label>
                                        <input type="text" name="titulo" id="titulo" class="form-control">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="status">Status</label>
                                        <select name="status" id="status"  style="width: 100%" class="form-control" multiple>
                                            <option value="1">Ativos</option>
                                            <option value="0">Inativos</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="encerrado">Finalização</label>
                                        <select name="encerrado" id="encerrado"  style="width: 100%" class="form-control" multiple>
                                            <option value="1">Abertos</option>
                                            <option value="0">Encerrados</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 ">
                                        <div class="">
                                            <label for="pool" class="">Pool (Não Atribuidos)</label>
                                            <input type="checkbox" name="pool" id="pool"   value="1" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <input type="button" id="btnBuscar" value="Buscar" class="btn btn-sm btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-5">
                <table id="resultado_chamados" class="table table-striped table-hover">
                    <thead class="thead-dark"></thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('more_scripts')
<script src="{{ URL::asset('js/chamado/index.js') }}" defer></script>
@endsection