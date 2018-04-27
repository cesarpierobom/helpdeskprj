<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" maxlength="200" name="nome" id="nome" value="{{$organizacao->nome}}" placeholder="">
        <div id="nome_feedback" class="invalid-feedback"></div>
        
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="razao_social">Razão Social</label>
        <input type="text" class="form-control" maxlength="200" name="razao_social" id="razao_social" value="{{$organizacao->razao_social}}" placeholder="">
        <div id="razao_social_feedback" class="invalid-feedback"></div>
        
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="documento">Documento/CNPJ</label>
        <input type="text" class="form-control" maxlength="200" name="documento" id="documento" value="{{$organizacao->documento}}" placeholder="">
        <div id="documento_feedback" class="invalid-feedback"></div>
        
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="codigo">Código</label>
        <input type="text" name="codigo" class="form-control" id="codigo" value="{{$organizacao->codigo}}" maxlength="50" placeholder="">
        <div id="codigo_feedback" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="status">Status</label>
        <select name="status" class="form-control" style="width: 100%" id="status">
            <option @if($organizacao->status == '1') selected='selected' @endif value="1">ATIVO</option>
            <option @if($organizacao->status == '0') selected='selected' @endif value="0">INATIVO</option>
        </select>
        <div id="status_feedback" class="invalid-feedback"></div>
    </div>
</div>