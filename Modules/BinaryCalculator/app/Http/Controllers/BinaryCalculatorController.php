<?php

namespace Modules\BinaryCalculator\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BinaryCalculatorController extends Controller
{
    public function cal() {
        return view('binarycalculator::index');
    }
}
