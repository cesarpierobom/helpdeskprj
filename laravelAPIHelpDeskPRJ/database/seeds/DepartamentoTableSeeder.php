<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;
use App\Models\Departamento;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Departamento::class, 5)->make()->each(function($departamento) {
            $organizacao = Organizacao::inRandomOrder()->first();
            $departamento->organizacao_id = $organizacao->id;
            $departamento->save();
        });
    }
}
