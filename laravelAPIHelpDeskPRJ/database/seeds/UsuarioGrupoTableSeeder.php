<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;
use App\Models\UsuarioGrupo;

class UsuarioGrupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UsuarioGrupo::class, 100)->make()->each(function($grupo) {
            $organizacao = Organizacao::inRandomOrder()->first();
            $grupo->organizacao_id = $organizacao->id;
            $grupo->save();
        });
    }
}
