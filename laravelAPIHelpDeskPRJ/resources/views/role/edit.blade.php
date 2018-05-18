@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header text-center">Editar Perfil</div>
                <div class="card-body">
                    <form id="formEditarPerfil" accept-charset="utf-8">
                        <input type="hidden" name="id" id="id" value="{{$role->id}}" placeholder="">
                        @include('role/form')

                        <div class="form-row">
                            <button type="button" id="btnTodos" class="btn btn-primary col-md-2 offset-md-1">Selecionar todas</button>
                            <button type="button" id="btnNenhum" class="btn btn-primary col-md-2 offset-md-1">Desmarcar todas</button>
                        </div>

                        <div class="form-row pt-5">
                            <button type="button" id="btnSalvar" class="btn btn-success col-md-2 offset-md-1">Salvar</button>
                            <button type="reset" id="btnResetarCadastro" class="btn btn-danger col-md-2 offset-md-1">Limpar</button>
                        </div>
                    </form>
                </div>
            <div>
        </div>
    </div>
</div>
@endsection


@section('more_scripts')
<script src="{{ URL::asset('js/role/edit.js') }}" defer></script>
@endsection

