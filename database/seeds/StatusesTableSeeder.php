<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::truncate();

        Status::create(['name'=>'pending']);
        Status::create(['name'=>'accepted']);
        Status::create(['name'=>'declined']);
    }
}
