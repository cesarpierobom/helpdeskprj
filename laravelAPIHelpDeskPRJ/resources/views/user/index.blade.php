@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card card-default">
                <div class="card-header">Usuarios</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formBuscarCategoriasChamados" accept-charset="utf-8">
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
                                        <label for="login">Login</label>
                                        <input type="text" name="login" id="login" value="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="perfil">Perfil</label>
                                        <select name="perfil_id" id="perfil_id"  style="width: 100%" class="form-control" multiple></select>                                        
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="" class="form-control" placeholder="">
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
                            <table id="resultado_categorias_chamados" class="table table-responsive-sm table-responsive-md table-responsive-lg">
                            </table>
                        </div>
                    </div>
                </div>
            <div>
        </div>
    </div>
</div>
@endsection


@section('more_scripts')
<script src="{{ URL::asset('js/chamado_categoria/index.js') }}" defer></script>
@endsection