@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header text-center">Editar Grupo de Usuario</div>
                <div class="card-body">
                    <form id="formEditarUsuarioGrupo" accept-charset="utf-8">
                        <input type="hidden" name="id" id="id" value="{{$usuarioGrupo->id}}" placeholder="">
                        @include('usuario_grupo/form')
                        <div class="form-row">
                            <button type="button" id="btnSalvar" class="btn btn-success col-md-4">Salvar</button>
                            <button type="reset" id="btnResetarCadastro" class="btn btn-danger col-md-4 offset-md-4">Limpar</button>
                        </div>
                    </form>
                </div>
            <div>
        </div>
    </div>
</div>
@endsection


@section('more_scripts')
<script src="{{ URL::asset('js/usuario_grupo/edit.js') }}" defer></script>
@endsection

