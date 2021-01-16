<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collaborator;
use App\Models\Company;
use Illuminate\Support\Str;
use DB;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collaborator = Collaborator::factory(50)->create();
    }
}
