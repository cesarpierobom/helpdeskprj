<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;
use App\Models\ChamadoCategoria;

class ChamadoCategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ChamadoCategoria::class, 100)->create()->each(function($cc) {
            $organizacao = Organizacao::orderByRaw('RAND()')->first();
            $cc->organizacao()->save($organizacao);
        });
    }
}
