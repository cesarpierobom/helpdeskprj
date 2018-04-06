@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header text-center">Cadastrar Situação/Status de Chamados</div>
                <div class="card-body">
                    <form id="formCadastrarChamadoSituacao" accept-charset="utf-8">
                        @include('chamado_situacao/form')

                        <div class="form-row">
                            <button type="submit" id="btnSalvar" class="btn btn-success col-md-4">Salvar</button>
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
<script src="{{ URL::asset('js/chamado_situacao/create.js') }}" defer></script>
@endsection