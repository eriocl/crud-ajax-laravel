<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getCars($id)
    {
        $cars = DB::table('cars')
            ->where(['client_id'=> $id, 'parking' => 0])
            ->get();
        $cars = json_decode(json_encode($cars, true));
        return response()->json($cars);
    }
}
