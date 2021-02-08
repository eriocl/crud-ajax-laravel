<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $clients = DB::table('clients')
            ->join('cars', 'clients.id', '=', 'cars.client_id')
            ->select('clients.name as name','clients.id as client_id', 'model', 'car_number')
            ->orderBy('name')
            ->Paginate(2);
        return view('client.index', compact('clients'));
    }
}
