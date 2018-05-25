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
        factory(Servico::class, 100)->create()->each(function($s) {
            $organizacao = Organizacao::orderByRaw('RAND()')->first();
            $s->organizacao()->save($organizacao);
        });
    }
}
