<?php

namespace App\Http\Controllers;

use App\Model\BoardOfDirector;
use Illuminate\Http\Request;

class BoardOfDirectorController extends Controller
{
    public function index(){
        $directors = BoardOfDirector::orderBy('sl_no','asc')->get();
        return view('frontend.directors')->with([
            'directors' => $directors
        ]);
    }
}
