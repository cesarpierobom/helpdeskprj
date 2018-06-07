<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="name">Nome</label>
        <input type="text" class="form-control" maxlength="200" name="name" id="name" value="{{$role->name}}" placeholder="">
        <div id="name_feedback" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="guard_name">Contexto</label>
        <select name="guard_name" id="guard_name" style="width: 100%" class="form-control">
            <option value="web">WEB</option>
            <option value="api">API</option>
        </select>
        <div id="guard_name_feedback" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="permissions">Permissoes</label>
        <select name="permissions" style="width: 100%" class="form-control" id="permissions" multiple></select>
        <div id="permissions_feedback" class="invalid-feedback"></div>
    </div>
</div>