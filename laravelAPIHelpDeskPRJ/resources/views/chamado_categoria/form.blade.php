<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="organizacao_id">Organização</label>
    <select name="organizacao_id" style="width: 100%" class="form-control" attr_selected="{{$chamadoCategoria->organizacao_id}}" id="organizacao_id"></select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="nome">Nome</label>
    <input type="text" class="form-control" maxlength="200" name="nome" id="nome" value="{{$chamadoCategoria->nome}}" placeholder="">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="codigo">Código</label>
    <input type="text" name="codigo" class="form-control" id="codigo" value="{{$chamadoCategoria->codigo}}" maxlength="50" placeholder="">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="status">Status</label>
        <select name="status" class="form-control" style="width: 100%" id="status">
            <option @if($chamadoCategoria->status == '1') selected='selected' @endif value="1">ATIVO</option>
            <option @if($chamadoCategoria->status == '0') selected='selected' @endif value="0">INATIVO</option>
        </select>
    </div>
</div>