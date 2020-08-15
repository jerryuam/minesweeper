<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{

    public function newGame(Request $request)
    {
        $minesCoordinates=[];//Array for saving de mines coordinates (x,y)
        do{
            $mineCoordinatesUsed=false;//Helper for cheking if there is a x,y coordinates for a mine
            $mineColNumber=rand(0,9);//x coordinate for a mine
            $mineRowNumber=rand(0,9);//y coordinate for a mine
            foreach($minesCoordinates as $key => $mineCoordinates){
                if($mineCoordinates==[$mineColNumber,$mineRowNumber]){//x,y coordinates validation, if true there already is a x,y with the same values
                    $mineCoordinatesUsed=true;
                    break;
                }
            }
            if(!$mineCoordinatesUsed){//If x,y coordinates are not used, insert the new coordinates into the array
                $minesCoordinates[]=[$mineColNumber,$mineRowNumber];
            }
        }while(count($minesCoordinates)<9);

        return $minesCoordinates;
    }
    
}
