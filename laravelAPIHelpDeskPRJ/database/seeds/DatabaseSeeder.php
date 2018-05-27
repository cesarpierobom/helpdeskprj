<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissoesSeeder::class);
        $this->call(CadastrosIniciaisSeeder::class);
        $this->call(OrganizacaoTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ServicoTableSeeder::class);
        $this->call(ChamadoCategoriaTableSeeder::class);
        $this->call(ChamadoFeedbackTableSeeder::class);
        $this->call(ChamadoPrioridadeTableSeeder::class);
        $this->call(ChamadoSituacaoTableSeeder::class);
        $this->call(ChamadoUrgenciaTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(SuporteGrupoTableSeeder::class);
        $this->call(UsuarioGrupoTableSeeder::class);
        // $this->call(SituacaoSLATableSeeder::class);
        $this->call(ChamadoTableSeeder::class);
        $this->call(InteracaoTableSeeder::class);
    }
}
