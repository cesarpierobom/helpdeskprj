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
        factory(ChamadoUrgencia::class, 100)->create();
    }
}
