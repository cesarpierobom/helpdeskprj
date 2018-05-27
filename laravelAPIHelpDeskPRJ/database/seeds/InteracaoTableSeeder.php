<?php

use Illuminate\Database\Seeder;
use App\Models\Chamado;
use App\Models\Interacao;
use App\Models\Organizacao;
use App\User;

class InteracaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Interacao::class, 10000)->make()->each(function($interacao) {
            $chamado = Chamado::inRandomOrder()->first();
            $analista = User::inRandomOrder()->first();
            $interacao->chamado_id = $chamado->id;
            $interacao->user_id = $analista->id;
            $interacao->save();
        });
    }
}
