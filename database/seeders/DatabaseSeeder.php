<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CollaboratorSeeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call([
            CompanySeeder::class,
            UserSeeder::class,
            CollaboratorSeeder::class,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
