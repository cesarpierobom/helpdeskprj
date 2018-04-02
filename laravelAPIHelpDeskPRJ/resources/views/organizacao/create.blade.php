@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header text-center">Cadastrar Organização</div>
                <div class="card-body">
                    <form id="formCadastrarOrganizacao" action="#!" accept-charset="utf-8">
                        @include('organizacao/form');
                        <button type=""></button>
                    </form>
                </div>
            <div>
        </div>
    </div>
</div>
@endsection


@section('more_scripts')
<script src="{{ URL::asset('js/organizacao/create.js') }}" defer></script>
@endsection