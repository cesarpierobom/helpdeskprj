<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;
use App\Models\SuporteGrupo;

class SuporteGrupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SuporteGrupo::class, 10)->create();
    }
}
