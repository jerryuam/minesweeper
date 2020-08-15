<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LevelsGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_levels')->insert([
            'game_level_name' => 'Beginner',
            'game_level_colums' => 9,
            'game_level_rows' => 9,
            'game_level_mines' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('game_levels')->insert([
            'game_level_name' => 'Intermediate',
            'game_level_colums' => 16,
            'game_level_rows' => 16,
            'game_level_mines' => 40,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('game_levels')->insert([
            'game_level_name' => 'Expert',
            'game_level_colums' => 16,
            'game_level_rows' => 30,
            'game_level_mines' => 99,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
