<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelsGame extends Model
{
    protected $fillable=[
        'level_game_name',
        'level_game_columls',
        'level_game_rows',
        'level_game_mines'
    ];
}
