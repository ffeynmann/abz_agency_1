<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert(['name' => 'Security']);
        DB::table('positions')->insert(['name' => 'Designer']);
        DB::table('positions')->insert(['name' => 'Content manager']);
        DB::table('positions')->insert(['name' => 'Lawyer']);
    }
}
