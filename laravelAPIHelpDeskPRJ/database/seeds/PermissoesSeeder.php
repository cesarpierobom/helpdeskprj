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
        $adminWeb = Role::findOrCreate("admin", "web");
        $adminAPI = Role::findOrCreate("admin_api", "api");

        $permissaoWeb = array();
        $permissaoAPI = array();
        
        $permissaoWeb[] = Permission::findOrCreate("web criar organizacao", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar organizacao", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar nova organizacao", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar organizacao", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar organizacao", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar organizacao", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar organizacao", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar organizacao", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar organizacao", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar nova organizacao", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar organizacao", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar organizacao", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar organizacao", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar organizacao", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar usuario", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar usuario", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar novo usuario", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar usuario", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar usuario", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar usuario", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar usuario", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar usuario", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar usuario", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar novo usuario", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar usuario", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar usuario", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar usuario", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar usuario", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar chamado", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar chamado", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar novo chamado", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar chamado", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar chamado", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar chamado", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar chamado", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar chamado", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar chamado", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar novo chamado", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar chamado", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar chamado", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar chamado", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar chamado", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar categoria", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar categoria", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar nova categoria", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar categoria", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar categoria", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar categoria", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar categoria", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar categoria", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar categoria", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar nova categoria", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar categoria", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar categoria", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar categoria", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar categoria", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar feedback", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar feedback", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar novo feedback", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar feedback", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar feedback", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar feedback", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar feedback", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar feedback", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar feedback", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar novo feedback", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar feedback", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar feedback", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar feedback", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar feedback", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar prioridade", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar prioridade", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar nova prioridade", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar prioridade", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar prioridade", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar prioridade", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar prioridade", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar prioridade", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar prioridade", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar nova prioridade", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar prioridade", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar prioridade", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar prioridade", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar prioridade", "api");        //destroy api
        
        $permissaoWeb[] = Permission::findOrCreate("web criar situacao", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar situacao", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar nova situacao", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar situacao", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar situacao", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar situacao", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar situacao", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar situacao", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar situacao", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar nova situacao", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar situacao", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar situacao", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar situacao", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar situacao", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar urgencia", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar urgencia", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar nova urgencia", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar urgencia", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar urgencia", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar urgencia", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar urgencia", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar urgencia", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar urgencia", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar nova urgencia", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar urgencia", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar urgencia", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar urgencia", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar urgencia", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar departamento", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar departamento", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar novo departamento", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar departamento", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar departamento", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar departamento", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar departamento", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar departamento", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar departamento", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar novo departamento", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar departamento", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar departamento", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar departamento", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar departamento", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar interacao", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar interacao", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar nova interacao", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar interacao", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar interacao", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar interacao", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar interacao", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar interacao", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar interacao", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar nova interacao", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar interacao", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar interacao", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar interacao", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar interacao", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar servico", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar servico", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar novo servico", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar servico", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar servico", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar servico", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar servico", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar servico", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar servico", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar novo servico", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar servico", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar servico", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar servico", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar servico", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar sla", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar sla", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar novo sla", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar sla", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar sla", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar sla", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar sla", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar sla", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar sla", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar novo sla", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar sla", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar sla", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar sla", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar sla", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar grupo de suporte", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar grupo de suporte", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar novo grupo de suporte", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar grupo de suporte", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar grupo de suporte", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar grupo de suporte", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar grupo de suporte", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar grupo de suporte", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar grupo de suporte", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar novo grupo de suporte", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar grupo de suporte", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar grupo de suporte", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar grupo de suporte", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar grupo de suporte", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar grupo de usuario", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar grupo de usuario", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar novo grupo de usuario", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar grupo de usuario", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar grupo de usuario", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar grupo de usuario", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar grupo de usuario", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar grupo de usuario", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar grupo de usuario", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar novo grupo de usuario", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar grupo de usuario", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar grupo de usuario", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar grupo de usuario", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar grupo de usuario", "api");        //destroy api

        $permissaoWeb[] = Permission::findOrCreate("web criar perfil", "web");          //create web
        $permissaoWeb[] = Permission::findOrCreate("web editar perfil", "web");         //edit web
        $permissaoWeb[] = Permission::findOrCreate("web salvar novo perfil", "web");    //store web
        $permissaoWeb[] = Permission::findOrCreate("web atualizar perfil", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar perfil", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar perfil", "web");     //show web
        $permissaoWeb[] = Permission::findOrCreate("web deletar perfil", "web");        //destroy web
        $permissaoAPI[] = Permission::findOrCreate("api criar perfil", "api");          //create api
        $permissaoAPI[] = Permission::findOrCreate("api editar perfil", "api");         //edit api
        $permissaoAPI[] = Permission::findOrCreate("api salvar novo perfil", "api");    //store api
        $permissaoAPI[] = Permission::findOrCreate("api atualizar perfil", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar perfil", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar perfil", "api");     //show api
        $permissaoAPI[] = Permission::findOrCreate("api deletar perfil", "api");        //destroy api

        // $permissaoWeb[] = Permission::findOrCreate("web criar permissao", "web");          //create web
        // $permissaoWeb[] = Permission::findOrCreate("web editar permissao", "web");         //edit web
        // $permissaoWeb[] = Permission::findOrCreate("web salvar nova permissao", "web");    //store web
        // $permissaoWeb[] = Permission::findOrCreate("web atualizar permissao", "web");      //update web
        $permissaoWeb[] = Permission::findOrCreate("web listar permissao", "web");         //index web
        $permissaoWeb[] = Permission::findOrCreate("web visualizar permissao", "web");     //show web
        // $permissaoWeb[] = Permission::findOrCreate("web deletar permissao", "web");        //destroy web
        // $permissaoAPI[] = Permission::findOrCreate("api criar permissao", "api");          //create api
        // $permissaoAPI[] = Permission::findOrCreate("api editar permissao", "api");         //edit api
        // $permissaoAPI[] = Permission::findOrCreate("api salvar nova permissao", "api");    //store api
        // $permissaoAPI[] = Permission::findOrCreate("api atualizar permissao", "api");      //update api
        $permissaoAPI[] = Permission::findOrCreate("api listar permissao", "api");         //index api
        $permissaoAPI[] = Permission::findOrCreate("api visualizar permissao", "api");     //show api
        // $permissaoAPI[] = Permission::findOrCreate("api deletar permissao", "api");        //destroy api


        $permissaoAPI[] = Permission::findOrCreate("api exibir interacao privada", "api");      // list/show api
        $permissaoAPI[] = Permission::findOrCreate("api inserir interacao privada", "api");      // store/update/edit/create api
        $permissaoWeb[] = Permission::findOrCreate("web inserir interacao privada", "web");      // store/update/edit/create web

        $adminWeb->syncPermissions($permissaoWeb);
        $adminAPI->syncPermissions($permissaoAPI);

        // organizacao_usuario          
    }
}
