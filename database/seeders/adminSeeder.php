<?php

namespace Database\Seeders;

use App\Models\admin;
use Database\Factories\adminFactory;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      //  admin::truncate();
        admin::factory()->count(1)->create();
    }
}
