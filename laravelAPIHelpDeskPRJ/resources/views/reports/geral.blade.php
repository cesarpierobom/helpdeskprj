@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card card-default">
                <div class="card-header text-center">
                    Relatorio visão Geral
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formFiltro" accept-charset="utf-8">
                                <div class="form-row">
                                    <div class="form-group col-md-10 offset-md-1">
                                        <label for="organizacao">Organização</label>
                                        <select name="organizacao" style="width: 100%" class="form-control" id="organizacao"></select>
                                        <div id="organizacao_feedback" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-5 offset-md-1">
                                        <label for="periodode">Periodo de:</label>
                                        <input type="date" name="periodode" id="periodode" value="" class="form-control" placeholder="">
                                    </div>

                                    <div class="form-group col-md-5">
                                        <label for="periodoate">Periodo até:</label>
                                        <input type="date" name="periodoate" id="periodoate" value="" class="form-control" placeholder="">
                                    </div>

                                </div>
                                <input type="button" id="btnBuscar" value="Buscar" class="btn btn-sm btn-primary offset-md-1">
                            </form>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 5%">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="resultado_organizacao" class="table table-striped table-hover">
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
<script src="{{ URL::asset('js/reports/geral.js') }}" defer></script>
@endsection