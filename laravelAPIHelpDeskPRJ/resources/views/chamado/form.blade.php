<div class="form-row">
    <div class="form-group col-md-5 offset-md-1">
        <label for="organizacao_id">Organização</label>
        <select name="organizacao_id" style="width: 100%" class="form-control" attr_selected="{{$chamado->organizacao_id}}" id="organizacao_id"></select>
        <div id="organizacao_id_feedback" class="invalid-feedback"></div>
    </div>
    <div class="form-group col-md-5">
        <label for="departamento_id">Departamento</label>
        <select name="departamento_id" style="width: 100%" class="form-control" attr_selected="{{$chamado->departamento_id}}" id="departamento_id"></select>
        <div id="departamento_id_feedback" class="invalid-feedback"></div>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-5 offset-md-1">
        <label for="servico_id">Servico</label>
        <select name="servico_id" style="width: 100%" class="form-control" attr_selected="{{$chamado->servico_id}}" id="servico_id"></select>
        <div id="servico_id_feedback" class="invalid-feedback"></div>
    </div>
    <div class="form-group col-md-5">
        <label for="chamado_categoria_id">Categoria</label>
        <select name="chamado_categoria_id" style="width: 100%" class="form-control" attr_selected="{{$chamado->chamado_categoria_id}}" id="chamado_categoria_id"></select>
        <div id="chamado_categoria_id_feedback" class="invalid-feedback"></div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-5 offset-md-1">
        <label for="chamado_urgencia_id">Urgência</label>
        <select name="chamado_urgencia_id" style="width: 100%" class="form-control" attr_selected="{{$chamado->chamado_urgencia_id}}" id="chamado_urgencia_id"></select>
        <div id="chamado_urgencia_id_feedback" class="invalid-feedback"></div>
    </div>
    
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control" value="{{$chamado->titulo}}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" class="form-control">{{$chamado->descricao}}</textarea>
        <div id="descricao_feedback" class="invalid-feedback"></div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-1 offset-md-1">
        <label for="encerrado">Encerrado</label>
        <input type="checkbox" name="encerrado" id="encerrado" @if($chamado->encerrado == '1') checked='checked' @endif  value="1" class="form-control">
    </div>
</div>


<div id="feedbackrow" class="form-row d-none">
    <div class="form-group col-md-5 offset-md-1">
        <label for="chamado_feedback_id">Feedback</label>
        <select name="chamado_feedback_id" style="width: 100%" class="form-control" attr_selected="{{$chamado->chamado_feedback_id}}" id="chamado_feedback_id"></select>
        <div id="chamado_feedback_id_feedback" class="invalid-feedback"></div>
    </div>
</div>