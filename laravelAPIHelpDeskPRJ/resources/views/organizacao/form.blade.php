<div class="form-group">
    <label for="nome">Nome Fantasia</label>
<input type="text" class="form-control" maxlength="200" name="nome" id="nome" value="{{$organizacao->nome}}" placeholder="">
</div>
<div class="form-group">
    <label for="razao_social">Razão Social</label>
    <input type="text" class="form-control" maxlength="200" name="razao_social" id="razao_social" value="{{$organizacao->razao_social}}" placeholder="">
</div>
<div class="form-row">
	<div class="form-group col-md-6">
	    <label for="documento">CNPJ</label>
	    <input type="text" class="form-control" maxlength="50" name="documento" id="documento" value="{{$organizacao->documento}}" placeholder="">
	</div>
	<div class="form-group col-md-6">
	    <label for="codigo">Código</label>
	    <input type="text" name="codigo" class="form-control" id="codigo" value="{{$organizacao->codigo}}" maxlength="50" placeholder="">
	</div>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select name="status" class="form-control" id="status">
        <option @if($organizacao->status == '1') selected='selected' @endif value="1">ATIVO</option>
        <option @if($organizacao->status == '0') selected='selected' @endif value="0">INATIVO</option>
    </select>
</div>