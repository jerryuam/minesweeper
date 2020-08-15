<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedGames extends Model
{
    protected $fillable=[
        'saved_game_state',
        'saved_game_time',
        'level_game_id',
        'player_id'
    ];
}
