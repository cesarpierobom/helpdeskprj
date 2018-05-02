@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header text-center">Editar Feedback de Chamados</div>
                <div class="card-body">
                    <form id="formEditarChamadoFeedback" accept-charset="utf-8">
                    <input type="hidden" name="id" id="id" value="{{$chamadoFeedback->id}}" placeholder="">
                        @include('chamado_feedback/form')
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
<script src="{{ URL::asset('js/chamado_feedback/edit.js') }}" defer></script>
@endsection

