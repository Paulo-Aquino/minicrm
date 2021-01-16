<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'Administrador',
            'email'          => 'admin@admin.com',
            'role'           => 'Administrador',
            'password'       => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        $company = User::factory(50)
                  ->create();

    }
}
