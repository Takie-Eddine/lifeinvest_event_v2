<?php

namespace App\Http\Controllers;

use App\Models\Partic;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    public function index(){

        $winners = Partic::all()->pluck('id')->toArray();

        return view('winner.winner', compact('winners'));
    }
}