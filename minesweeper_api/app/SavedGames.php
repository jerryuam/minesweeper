<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedGames extends Model
{
    protected $fillable=[
        'saved_game_state',
        'saved_game_time',
        'game_level_id',
        'player_id'
    ];
}
