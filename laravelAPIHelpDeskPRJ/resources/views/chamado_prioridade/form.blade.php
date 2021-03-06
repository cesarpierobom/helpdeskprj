<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" maxlength="200" name="nome" id="nome" value="{{$chamadoPrioridade->nome}}" placeholder="">
        <div id="nome_feedback" class="invalid-feedback"></div>
        
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="codigo">Código</label>
        <input type="text" name="codigo" class="form-control" id="codigo" value="{{$chamadoPrioridade->codigo}}" maxlength="50" placeholder="">
        <div id="codigo_feedback" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="status">Status</label>
        <select name="status" class="form-control" style="width: 100%" id="status">
            <option @if($chamadoPrioridade->status == '1') selected='selected' @endif value="1">ATIVO</option>
            <option @if($chamadoPrioridade->status == '0') selected='selected' @endif value="0">INATIVO</option>
        </select>
        <div id="status_feedback" class="invalid-feedback"></div>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-5 offset-md-1">
        <div class="form-check form-check-inline">
            <label for="padrao" class="form-check-label">Padrão para novos chamados</label>
            <input type="checkbox" name="padrao" id="padrao" @if($chamadoPrioridade->padrao == '1') selected='selected' @endif  value="1" class="form-check-input">
            <div id="padrao_feedback" class="invalid-feedback"></div>
        </div>
    </div>
</div>