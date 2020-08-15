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
        DB::table('levels_game')->insert([
            'level_game_name' => 'Beginner',
            'level_game_columls' => 9,
            'level_game_rows' => 9,
            'level_game_mines' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('levels_game')->insert([
            'level_game_name' => 'Intermediate',
            'level_game_columls' => 16,
            'level_game_rows' => 16,
            'level_game_mines' => 40,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('levels_game')->insert([
            'level_game_name' => 'Expert',
            'level_game_columls' => 16,
            'level_game_rows' => 30,
            'level_game_mines' => 99,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
