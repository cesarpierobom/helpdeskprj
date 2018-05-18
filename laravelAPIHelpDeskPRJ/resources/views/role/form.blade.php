<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="name">Nome</label>
        <input type="text" class="form-control" maxlength="200" name="name" id="name" value="{{$role->name}}" placeholder="">
        <div id="name_feedback" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-row">
    <!-- <div class="form-group col-md-4 offset-md-1">
        <label for="permissions_off">Permissoes Disponiveis</label>
        <select class="form-control" name="permissions_off" id="permissions_off" multiple></select>
        <div id="permissions_off_feedback" class="invalid-feedback"></div>
    </div>

    <div class="form-group col-md-2 pt-5 pl-5" >
        <button type="button" title="Conceder" id="btnConceder" class="btn btn-primary"> >> </button>
        <button type="button" title="Remover" id="btnConceder" class="btn btn-primary"> << </button>
    </div>
    
    <div class="form-group col-md-4">
        <label for="permissions_on">Permissoes Concedidas</label>
        <select class="form-control" name="permissions_on" id="permissions_on" multiple></select>
        <div id="permissions_on_feedback" class="invalid-feedback"></div>
    </div> -->
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="permissions">Permissoes</label>
        <select name="permissions" style="width: 100%" class="form-control" id="permissions" multiple></select>
        <div id="permissions_feedback" class="invalid-feedback"></div>
    </div>
</div>