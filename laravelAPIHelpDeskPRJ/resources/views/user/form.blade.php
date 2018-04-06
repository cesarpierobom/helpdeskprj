<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="organizacao_id">Organização de Origem</label>
        <select name="organizacao_origem" style="width: 100%" class="form-control" id="organizacao_origem" ></select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="organizacao_id">Organizações Visiveis</label>
        <select name="organizacao_id" style="width: 100%" class="form-control" id="organizacao_id" multiple></select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-5 ">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" maxlength="200" name="nome" id="nome" value="" placeholder="">
    </div>
    <div class="form-group col-md-5 ">
        <label for="nome">Sobrenome</label>
        <input type="text" class="form-control" maxlength="200" name="nome" id="nome" value="" placeholder="">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-5 ">
        <label for="nome">Sexo Biológico</label>
        <input type="radio" name="sexo" id="m"> Masculino
        <input type="radio" name="sexo" id="f"> Feminino
    </div>
    <div class="form-group col-md-5 ">
        <label for="nome">Sobrenome</label>
        <input type="text" class="form-control" maxlength="200" name="nome" id="nome" value="" placeholder="">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" class="form-control" id="cpf" value="" maxlength="50" placeholder="">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-5 ">
        <label for="nome">Usuario</label>
        <input type="text" class="form-control" maxlength="200" name="nome" id="nome" value="" placeholder="">
    </div>

    <div class="form-group col-md-5 ">
        <label for="email">Email</label>
        <input type="email" class="form-control" maxlength="200" name="email" id="email" value="" placeholder="">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-5 ">
        <label for="password">Senha</label>
        <input type="password" class="form-control" maxlength="50" name="password" id="password" value="" placeholder="">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-5 ">
        <label for="password">Senha</label>
        <input type="password-confirm" class="form-control" maxlength="50" name="password-confirm" id="password-confirm" value="" placeholder="">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="perfil">Perfil</label>
        <select name="perfil" style="width: 100%" class="form-control" id="perfil" ></select>        
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10 offset-md-1">
        <label for="status">Status</label>
        <select name="status" class="form-control" style="width: 100%" id="status">
            <option value="1">ATIVO</option>
            <option value="0">INATIVO</option>
        </select>
    </div>
</div>