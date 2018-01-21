<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class difficulty_levelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('difficulty_level')->insert([
            'id'=>1,
            'level_name' => 'Novice',
        ]);
        DB::table('difficulty_level')->insert([
            'id'=>2,
            'level_name' => 'Beginner',
        ]);
        DB::table('difficulty_level')->insert([
            'id'=>3,
            'level_name' => 'Intermediate',
        ]);
        DB::table('difficulty_level')->insert([
            'id'=>4,
            'level_name' => 'Advanced',
        ]);
        DB::table('difficulty_level')->insert([
            'id'=>5,
            'level_name' => 'Expert',
        ]);
    }
}
