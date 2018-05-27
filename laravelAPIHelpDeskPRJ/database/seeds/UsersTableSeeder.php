<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Organizacao;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 100)->make()->each(function ($user) {
            $organizacao = Organizacao::inRandomOrder()->first();
            $user->organizacao_id = $organizacao->id;
            $user->save();
            $visiveis = Organizacao::inRandomOrder()->limit(mt_rand(1,10))->get(['id'])->toArray();
            $visiveis = array_pluck($visiveis, "id");
            $user->organizacao_visivel()->attach($visiveis);
        });
        
    }
}
