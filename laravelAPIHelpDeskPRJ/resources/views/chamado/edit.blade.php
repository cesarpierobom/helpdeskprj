@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card card-default">
                <div class="card-header text-center">
                    Editar Chamado
                </div>
                <div class="card-body">
                    <form id="formEditarChamado" accept-charset="utf-8">
                        <input type="hidden" name="id" id="id" value="{{$chamado->id}}" placeholder="">
                        @include('chamado/form')

                        <div class="form-row pt-5">
                            <button type="button" id="btnSalvar" class="btn btn-success col-md-2 offset-md-1">Salvar Dados</button>
                            <button type="reset" id="btnResetarCadastro" class="btn btn-danger col-md-2 offset-md-1">Limpar Dados</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header text-center">Nova Interação</div>
                <div class="card-body">
                    <form id="formAdicionarInteracao">
                        <div class="form-row pt-5">
                            <div class="form-group col-md-10 offset-md-1">
                                <label for="interacao">Descrição</label>
                                <textarea name="interacao" id="interacao" class="form-control"></textarea>
                                <div id="interacao_feedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        
                        @if(auth()->user()->can("inserir interacao privada"))
                            <div class="form-row pt-5">
                                <div class="form-group col-md-2 offset-md-1">
                                    <label for="publica">Tipo de Interação</label>
                                    <select name="publica" id="publica" style="width: 100%" class="form-control">
                                        <option value="1">Publica</option>
                                        <option value="2">Privada</option>
                                    </select>
                                </div>
                            </div>
                        @endif

                        <div class="form-row pt-5">
                            <button type="button" id="btnAdicionarInteracao" class="btn btn-success col-md-2 offset-md-1">Adicionar Interação</button>
                            <button type="reset" id="btnResetarInteracao" class="btn btn-danger col-md-2 offset-md-1">Limpar Interação</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header text-center">Interações</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="resultado_interacoes" class="table table-striped table-hover">
                            <thead class="thead-dark"></thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection


@section('more_scripts')
<script src="{{ URL::asset('js/chamado/edit.js') }}" defer></script>
@endsection

