<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;
use App\Models\ChamadoUrgencia;

class ChamadoUrgenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ChamadoUrgencia::class, 100)->make()->each(function($urgencia) {
            $organizacao = Organizacao::inRandomOrder()->first();
            $urgencia->organizacao_id = $organizacao->id;
            $urgencia->save();
        });
    }
}
