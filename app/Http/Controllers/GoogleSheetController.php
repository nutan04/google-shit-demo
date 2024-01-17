<?php

namespace App\Http\Controllers;

use DB;
use Sheets;

class GoogleSheetController extends Controller
{
    public function index()
    {
        $sheet = Sheets::spreadsheet('17ym80GXRlHBLxCl8MYEucAKdgjIgVgDLsk2pb7_0tAg')->sheet('googleshotproject')->get();
        $header = $sheet->pull(0);
        $values = Sheets::collection(header: $header, rows: $sheet);
        $data = $values->toArray();

        $arraylength = count($data);
        for ($i = 1; $i <= $arraylength; $i++) {
            DB::table('users')->insert($data[$i]);
        }

    }

    public function googledata(){
        $users = DB::select('select * from users');
        return view('googlesheet',['users'=>$users]);
    }

}
