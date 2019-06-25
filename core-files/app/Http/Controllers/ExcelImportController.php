<?php

namespace App\Http\Controllers;

use App\Model\Item\Item;
use Illuminate\Http\Request;
use Excel;

class ExcelImportController extends Controller
{
    public function index(){
        $path = public_path('medicine.xls');
        $results = Excel::load($path,function($reader){
            $reader->all();
        })->get();
        for ($i=0; $i<count($results); $i++){
            if($i==1000){
                break;
            }
            if($results[$i]['medicine'] != '' && $results[$i]['medicine']){
                Item::firstOrCreate([
                    'item_name'  => $results[$i]['medicine'],
                ]);
            }
        }

        return "Successfully imported medicine form 1 to 1000";
    }
}
