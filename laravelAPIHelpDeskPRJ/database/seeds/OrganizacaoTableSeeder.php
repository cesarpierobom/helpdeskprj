<?php

use Illuminate\Database\Seeder;

class OrganizacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Organizacao::class, 10)->create();
    }
}
