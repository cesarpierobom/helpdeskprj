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
                                <div class="form-row"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('more_scripts')
<script src="{{ URL::asset('js/chamado/index.js') }}" defer></script>
@endsection