<?php

namespace Modules\Game\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function game() {
        return view('game::game');
    }

    public function game1() {
        return view('game::game1');
    }

    public function game2() {
        return view('game::game2');
    }
}
