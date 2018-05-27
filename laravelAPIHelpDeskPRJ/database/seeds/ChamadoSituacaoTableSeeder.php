<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;
use App\Models\ChamadoSituacao;

class ChamadoSituacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ChamadoSituacao::class, 100)->make()->each(function($situacao) {
            $organizacao = Organizacao::inRandomOrder()->first();
            $situacao->organizacao_id = $organizacao->id;
            $situacao->save();
        });
    }
}
