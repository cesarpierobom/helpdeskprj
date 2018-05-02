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
        Role::findOrCreate(['name' => 'admin']);

        Permission::findOrCreate(['name' => 'tela criar organizacao']);   //create
        Permission::findOrCreate(['name' => 'tela editar organizacao']);  //edit
        Permission::findOrCreate(['name' => 'salvar nova organizacao']);  //store
        Permission::findOrCreate(['name' => 'atualizar organizacao']);    //update
        Permission::findOrCreate(['name' => 'listar organizacao']);       //index
        Permission::findOrCreate(['name' => 'visualizar organizacao']);   //show
        Permission::findOrCreate(['name' => 'deletar organizacao']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar usuario']);   //create
        Permission::findOrCreate(['name' => 'tela editar usuario']);  //edit
        Permission::findOrCreate(['name' => 'salvar novo usuario']);  //store
        Permission::findOrCreate(['name' => 'atualizar usuario']);    //update
        Permission::findOrCreate(['name' => 'listar usuario']);       //index
        Permission::findOrCreate(['name' => 'visualizar usuario']);   //show
        Permission::findOrCreate(['name' => 'deletar usuario']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar chamado']);   //create
        Permission::findOrCreate(['name' => 'tela editar chamado']);  //edit
        Permission::findOrCreate(['name' => 'salvar novo chamado']);  //store
        Permission::findOrCreate(['name' => 'atualizar chamado']);    //update
        Permission::findOrCreate(['name' => 'listar chamado']);       //index
        Permission::findOrCreate(['name' => 'visualizar chamado']);   //show
        Permission::findOrCreate(['name' => 'deletar chamado']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar categoria']);   //create
        Permission::findOrCreate(['name' => 'tela editar categoria']);  //edit
        Permission::findOrCreate(['name' => 'salvar nova categoria']);  //store
        Permission::findOrCreate(['name' => 'atualizar categoria']);    //update
        Permission::findOrCreate(['name' => 'listar categoria']);       //index
        Permission::findOrCreate(['name' => 'visualizar categoria']);   //show
        Permission::findOrCreate(['name' => 'deletar categoria']);      //destroy
        
        Permission::findOrCreate(['name' => 'tela criar feedback']);   //create
        Permission::findOrCreate(['name' => 'tela editar feedback']);  //edit
        Permission::findOrCreate(['name' => 'salvar novo feedback']);  //store
        Permission::findOrCreate(['name' => 'atualizar feedback']);    //update
        Permission::findOrCreate(['name' => 'listar feedback']);       //index
        Permission::findOrCreate(['name' => 'visualizar feedback']);   //show
        Permission::findOrCreate(['name' => 'deletar feedback']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar prioridade']);   //create
        Permission::findOrCreate(['name' => 'tela editar prioridade']);  //edit
        Permission::findOrCreate(['name' => 'salvar nova prioridade']);  //store
        Permission::findOrCreate(['name' => 'atualizar prioridade']);    //update
        Permission::findOrCreate(['name' => 'listar prioridade']);       //index
        Permission::findOrCreate(['name' => 'visualizar prioridade']);   //show
        Permission::findOrCreate(['name' => 'deletar prioridade']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar situacao']);   //create
        Permission::findOrCreate(['name' => 'tela editar situacao']);  //edit
        Permission::findOrCreate(['name' => 'salvar nova situacao']);  //store
        Permission::findOrCreate(['name' => 'atualizar situacao']);    //update
        Permission::findOrCreate(['name' => 'listar situacao']);       //index
        Permission::findOrCreate(['name' => 'visualizar situacao']);   //show
        Permission::findOrCreate(['name' => 'deletar situacao']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar urgencia']);   //create
        Permission::findOrCreate(['name' => 'tela editar urgencia']);  //edit
        Permission::findOrCreate(['name' => 'salvar nova urgencia']);  //store
        Permission::findOrCreate(['name' => 'atualizar urgencia']);    //update
        Permission::findOrCreate(['name' => 'listar urgencia']);       //index
        Permission::findOrCreate(['name' => 'visualizar urgencia']);   //show
        Permission::findOrCreate(['name' => 'deletar urgencia']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar departamento']);   //create
        Permission::findOrCreate(['name' => 'tela editar departamento']);  //edit
        Permission::findOrCreate(['name' => 'salvar novo departamento']);  //store
        Permission::findOrCreate(['name' => 'atualizar departamento']);    //update
        Permission::findOrCreate(['name' => 'listar departamento']);       //index
        Permission::findOrCreate(['name' => 'visualizar departamento']);   //show
        Permission::findOrCreate(['name' => 'deletar departamento']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar interacao']);   //create
        Permission::findOrCreate(['name' => 'tela editar interacao']);  //edit
        Permission::findOrCreate(['name' => 'salvar nova interacao']);  //store
        Permission::findOrCreate(['name' => 'atualizar interacao']);    //update
        Permission::findOrCreate(['name' => 'listar interacao']);       //index
        Permission::findOrCreate(['name' => 'visualizar interacao']);   //show
        Permission::findOrCreate(['name' => 'deletar interacao']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar servico']);   //create
        Permission::findOrCreate(['name' => 'tela editar servico']);  //edit
        Permission::findOrCreate(['name' => 'salvar novo servico']);  //store
        Permission::findOrCreate(['name' => 'atualizar servico']);    //update
        Permission::findOrCreate(['name' => 'listar servico']);       //index
        Permission::findOrCreate(['name' => 'visualizar servico']);   //show
        Permission::findOrCreate(['name' => 'deletar servico']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar sla']);   //create
        Permission::findOrCreate(['name' => 'tela editar sla']);  //edit
        Permission::findOrCreate(['name' => 'salvar novo sla']);  //store
        Permission::findOrCreate(['name' => 'atualizar sla']);    //update
        Permission::findOrCreate(['name' => 'listar sla']);       //index
        Permission::findOrCreate(['name' => 'visualizar sla']);   //show
        Permission::findOrCreate(['name' => 'deletar sla']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar grupo de suporte']);   //create
        Permission::findOrCreate(['name' => 'tela editar grupo de suporte']);  //edit
        Permission::findOrCreate(['name' => 'salvar novo grupo de suporte']);  //store
        Permission::findOrCreate(['name' => 'atualizar grupo de suporte']);    //update
        Permission::findOrCreate(['name' => 'listar grupo de suporte']);       //index
        Permission::findOrCreate(['name' => 'visualizar grupo de suporte']);   //show
        Permission::findOrCreate(['name' => 'deletar grupo de suporte']);      //destroy

        Permission::findOrCreate(['name' => 'tela criar grupo de usuario']);   //create
        Permission::findOrCreate(['name' => 'tela editar grupo de usuario']);  //edit
        Permission::findOrCreate(['name' => 'salvar novo grupo de usuario']);  //store
        Permission::findOrCreate(['name' => 'atualizar grupo de usuario']);    //update
        Permission::findOrCreate(['name' => 'listar grupo de usuario']);       //index
        Permission::findOrCreate(['name' => 'visualizar grupo de usuario']);   //show
        Permission::findOrCreate(['name' => 'deletar grupo de usuario']);      //destroy

        // organizacao_usuario          

        
    }
}
