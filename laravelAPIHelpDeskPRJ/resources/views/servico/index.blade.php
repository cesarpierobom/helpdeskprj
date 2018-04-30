@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card card-default">
                <div class="card-header text-center">
                    Serviços
                    <a class="btn btn-sm btn-success float-right" href="{{route('servico.create')}}">Cadastrar</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formBuscarServico" accept-charset="utf-8">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="organizacao_id">Organizações</label>
                                        <select name="organizacao_id" id="organizacao_id"  style="width: 100%" class="form-control" multiple></select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nome">Nome</label>
                                        <input type="text" name="nome" id="nome" value="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="codigo">Codigo</label>
                                        <input type="text" name="codigo" id="codigo" value="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control" style="width: 100%" multiple>
                                            <option value="1" selected>ATIVO</option>
                                            <option value="0">INATIVO</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="button" id="btnBuscar" value="Buscar" class="btn btn-sm btn-primary">
                            </form>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 5%">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="resultado_servico" class="table "></table>
                            </div>
                        </div>
                    </div>
                </div>
            <div>
        </div>
    </div>
</div>
@endsection


@section('more_scripts')
<script src="{{ URL::asset('js/servico/index.js') }}" defer></script>
@endsection