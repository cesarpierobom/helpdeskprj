@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header text-center">Cadastrar Categoria de Chamados</div>
                <div class="card-body">
                    <form id="formCadastrarCategoriaChamado" accept-charset="utf-8">
                        @include('chamado_categoria/form');
                    </form>
                </div>
            <div>
        </div>
    </div>
</div>
@endsection


@section('more_scripts')
<script src="{{ URL::asset('js/chamado_categoria/create.js') }}" defer></script>
@endsection