@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card card-default">
                <div class="card-header text-center">
                    Perfis
                    <a class="btn btn-sm btn-success float-right" href="{{route('role.create')}}">Cadastrar</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formBuscarPerfil" accept-charset="utf-8">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nome</label>
                                        <input type="text" name="name" id="name" value="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <input type="button" id="btnBuscar" value="Buscar" class="btn btn-sm btn-primary">
                            </form>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 5%">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="resultado_role" class="table table-striped table-hover">
                                    <thead class="thead-dark"></thead>
                                </table>
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
<script src="{{ URL::asset('js/role/index.js') }}" defer></script>
@endsection