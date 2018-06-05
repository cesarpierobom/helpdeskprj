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
        factory(ChamadoPrioridade::class, 100)->create();
    }
}
