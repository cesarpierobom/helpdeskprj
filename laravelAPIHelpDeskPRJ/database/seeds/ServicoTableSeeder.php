<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;
use App\Models\Servico;

class ServicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Servico::class, 100)->make()->each(function($servico) {
            $organizacao = Organizacao::inRandomOrder()->first();
            $servico->organizacao_id = $organizacao->id;
            $servico->save();
        });
    }
}
