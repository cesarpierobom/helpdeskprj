<?php

use Illuminate\Database\Seeder;
use App\Models\Organizacao;

class OrganizacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Organizacao::class, 10)->create();
    }
}
