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
        factory(ChamadoCategoria::class, 100)->make()->each(function($categoria) {
            $organizacao = Organizacao::inRandomOrder()->first();
            $categoria->organizacao_id = $organizacao->id;
            $categoria->save();
        });
    }
}
