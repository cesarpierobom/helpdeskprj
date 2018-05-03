<?php

use Illuminate\Database\Seeder;
use App\User;

class CadastrosIniciaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            ['login' => 'admin'],
            [
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'name' => 'Admin',
                'api_token' => str_random(100)
            ]
        );

        $user->assignRole('admin');
    }
}
