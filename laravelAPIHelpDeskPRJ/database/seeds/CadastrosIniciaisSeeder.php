<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
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
        app()['cache']->forget('spatie.permission.cache');
        
        $user = User::firstOrCreate(
            ["login" => "admin"],
            [
                "email" => "admin@example.com",
                "password" => Hash::make("admin"),
                "name" => "Admin",
                "api_token" => str_random(100)
            ]
        );

        $user->assignRole(Role::whereIn("name", ["admin", "admin_api"])->get());
    }
}
