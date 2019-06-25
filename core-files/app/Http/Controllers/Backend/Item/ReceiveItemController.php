<?php

namespace App\Http\Controllers\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceiveItemController extends Controller
{
    public function index(){
        return view('item.receive-item');
    }
}
