<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;
use App\Models\ChamadoPrioridade;

class ChamadoPrioridadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ChamadoPrioridade::class, 100)->make()->each(function($prioridade) {
            $organizacao = Organizacao::inRandomOrder()->first();
            $prioridade->organizacao_id = $organizacao->id;
            $prioridade->save();
        });
    }
}
