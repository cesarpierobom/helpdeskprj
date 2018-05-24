<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;


class PermissoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::findOrCreate('admin');

        $permissao = array();

        $permissao[] = Permission::findOrCreate('tela criar organizacao');   //create
        $permissao[] = Permission::findOrCreate('tela editar organizacao');  //edit
        $permissao[] = Permission::findOrCreate('salvar nova organizacao');  //store
        $permissao[] = Permission::findOrCreate('atualizar organizacao');    //update
        $permissao[] = Permission::findOrCreate('listar organizacao');       //index
        $permissao[] = Permission::findOrCreate('visualizar organizacao');   //show
        $permissao[] = Permission::findOrCreate('deletar organizacao');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar usuario');   //create
        $permissao[] = Permission::findOrCreate('tela editar usuario');  //edit
        $permissao[] = Permission::findOrCreate('salvar novo usuario');  //store
        $permissao[] = Permission::findOrCreate('atualizar usuario');    //update
        $permissao[] = Permission::findOrCreate('listar usuario');       //index
        $permissao[] = Permission::findOrCreate('visualizar usuario');   //show
        $permissao[] = Permission::findOrCreate('deletar usuario');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar chamado');   //create
        $permissao[] = Permission::findOrCreate('tela editar chamado');  //edit
        $permissao[] = Permission::findOrCreate('salvar novo chamado');  //store
        $permissao[] = Permission::findOrCreate('atualizar chamado');    //update
        $permissao[] = Permission::findOrCreate('listar chamado');       //index
        $permissao[] = Permission::findOrCreate('visualizar chamado');   //show
        $permissao[] = Permission::findOrCreate('deletar chamado');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar categoria');   //create
        $permissao[] = Permission::findOrCreate('tela editar categoria');  //edit
        $permissao[] = Permission::findOrCreate('salvar nova categoria');  //store
        $permissao[] = Permission::findOrCreate('atualizar categoria');    //update
        $permissao[] = Permission::findOrCreate('listar categoria');       //index
        $permissao[] = Permission::findOrCreate('visualizar categoria');   //show
        $permissao[] = Permission::findOrCreate('deletar categoria');      //destroy
        
        $permissao[] = Permission::findOrCreate('tela criar feedback');   //create
        $permissao[] = Permission::findOrCreate('tela editar feedback');  //edit
        $permissao[] = Permission::findOrCreate('salvar novo feedback');  //store
        $permissao[] = Permission::findOrCreate('atualizar feedback');    //update
        $permissao[] = Permission::findOrCreate('listar feedback');       //index
        $permissao[] = Permission::findOrCreate('visualizar feedback');   //show
        $permissao[] = Permission::findOrCreate('deletar feedback');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar prioridade');   //create
        $permissao[] = Permission::findOrCreate('tela editar prioridade');  //edit
        $permissao[] = Permission::findOrCreate('salvar nova prioridade');  //store
        $permissao[] = Permission::findOrCreate('atualizar prioridade');    //update
        $permissao[] = Permission::findOrCreate('listar prioridade');       //index
        $permissao[] = Permission::findOrCreate('visualizar prioridade');   //show
        $permissao[] = Permission::findOrCreate('deletar prioridade');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar situacao');   //create
        $permissao[] = Permission::findOrCreate('tela editar situacao');  //edit
        $permissao[] = Permission::findOrCreate('salvar nova situacao');  //store
        $permissao[] = Permission::findOrCreate('atualizar situacao');    //update
        $permissao[] = Permission::findOrCreate('listar situacao');       //index
        $permissao[] = Permission::findOrCreate('visualizar situacao');   //show
        $permissao[] = Permission::findOrCreate('deletar situacao');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar urgencia');   //create
        $permissao[] = Permission::findOrCreate('tela editar urgencia');  //edit
        $permissao[] = Permission::findOrCreate('salvar nova urgencia');  //store
        $permissao[] = Permission::findOrCreate('atualizar urgencia');    //update
        $permissao[] = Permission::findOrCreate('listar urgencia');       //index
        $permissao[] = Permission::findOrCreate('visualizar urgencia');   //show
        $permissao[] = Permission::findOrCreate('deletar urgencia');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar departamento');   //create
        $permissao[] = Permission::findOrCreate('tela editar departamento');  //edit
        $permissao[] = Permission::findOrCreate('salvar novo departamento');  //store
        $permissao[] = Permission::findOrCreate('atualizar departamento');    //update
        $permissao[] = Permission::findOrCreate('listar departamento');       //index
        $permissao[] = Permission::findOrCreate('visualizar departamento');   //show
        $permissao[] = Permission::findOrCreate('deletar departamento');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar interacao');   //create
        $permissao[] = Permission::findOrCreate('tela editar interacao');  //edit
        $permissao[] = Permission::findOrCreate('salvar nova interacao');  //store
        $permissao[] = Permission::findOrCreate('atualizar interacao');    //update
        $permissao[] = Permission::findOrCreate('listar interacao');       //index
        $permissao[] = Permission::findOrCreate('visualizar interacao');   //show
        $permissao[] = Permission::findOrCreate('deletar interacao');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar servico');   //create
        $permissao[] = Permission::findOrCreate('tela editar servico');  //edit
        $permissao[] = Permission::findOrCreate('salvar novo servico');  //store
        $permissao[] = Permission::findOrCreate('atualizar servico');    //update
        $permissao[] = Permission::findOrCreate('listar servico');       //index
        $permissao[] = Permission::findOrCreate('visualizar servico');   //show
        $permissao[] = Permission::findOrCreate('deletar servico');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar sla');   //create
        $permissao[] = Permission::findOrCreate('tela editar sla');  //edit
        $permissao[] = Permission::findOrCreate('salvar novo sla');  //store
        $permissao[] = Permission::findOrCreate('atualizar sla');    //update
        $permissao[] = Permission::findOrCreate('listar sla');       //index
        $permissao[] = Permission::findOrCreate('visualizar sla');   //show
        $permissao[] = Permission::findOrCreate('deletar sla');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar grupo de suporte');   //create
        $permissao[] = Permission::findOrCreate('tela editar grupo de suporte');  //edit
        $permissao[] = Permission::findOrCreate('salvar novo grupo de suporte');  //store
        $permissao[] = Permission::findOrCreate('atualizar grupo de suporte');    //update
        $permissao[] = Permission::findOrCreate('listar grupo de suporte');       //index
        $permissao[] = Permission::findOrCreate('visualizar grupo de suporte');   //show
        $permissao[] = Permission::findOrCreate('deletar grupo de suporte');      //destroy

        $permissao[] = Permission::findOrCreate('tela criar grupo de usuario');   //create
        $permissao[] = Permission::findOrCreate('tela editar grupo de usuario');  //edit
        $permissao[] = Permission::findOrCreate('salvar novo grupo de usuario');  //store
        $permissao[] = Permission::findOrCreate('atualizar grupo de usuario');    //update
        $permissao[] = Permission::findOrCreate('listar grupo de usuario');       //index
        $permissao[] = Permission::findOrCreate('visualizar grupo de usuario');   //show
        $permissao[] = Permission::findOrCreate('deletar grupo de usuario');      //destroy

        
        $permissao[] = Permission::findOrCreate('tela criar perfil');   //create
        $permissao[] = Permission::findOrCreate('tela editar perfil');  //edit
        $permissao[] = Permission::findOrCreate('salvar novo perfil');  //store
        $permissao[] = Permission::findOrCreate('atualizar perfil');    //update
        $permissao[] = Permission::findOrCreate('listar perfil');       //index
        $permissao[] = Permission::findOrCreate('visualizar perfil');   //show
        $permissao[] = Permission::findOrCreate('deletar perfil');      //destroy


        // $permissao[] = Permission::findOrCreate('tela criar sla');   //create
        // $permissao[] = Permission::findOrCreate('tela editar sla');  //edit
        // $permissao[] = Permission::findOrCreate('salvar novo sla');  //store
        // $permissao[] = Permission::findOrCreate('atualizar sla');    //update
        $permissao[] = Permission::findOrCreate('listar permissao');       //index
        $permissao[] = Permission::findOrCreate('visualizar permissao');   //show
        // $permissao[] = Permission::findOrCreate('deletar sla');      //destroy


        $admin->syncPermissions($permissao);
        // organizacao_usuario          
        
    }
}
