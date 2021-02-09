<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index()
    {
        /*$clients = DB::table('clients')
            ->join('cars', 'clients.id', '=', 'cars.client_id')
            ->select('clients.name as name','clients.id as id', 'model', 'number as carNumber', 'cars.id as carId')
            ->orderBy('name')
            ->Paginate(10);*/
        $parkedCars = DB::table('cars')
            ->where('parking', 1)
            ->select('brand', 'model', 'color', 'number', 'created_at', 'parking', 'id')
            ->orderBy('created_at')
            ->get();
        $clients = DB::table('clients')
            ->paginate(5);
        return view('client.index', compact('clients', 'parkedCars'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'client.name' => 'min:3|unique:clients,name',
            'client.phone' => 'numeric|unique:clients,phone',
            'client.address' => 'min:3|'
        ]);
        $this->validate($request, [
            'car.number' => 'unique:cars,number|size:6',
        ]);
        $client = $request->input('client');
        $car = $request->input('car');
        $id = DB::table('clients')->insertGetId(['name' => $client['name'], 'gender' => $client['gender'], 'phone' => $client['phone'], 'address' => $client['address']]);
        DB::table('cars')->insert(['client_id' => $id, 'brand' => $car['brand'], 'model' => $car['model'], 'color' => $car['color'], 'number' => $car['number']]);
        return redirect()->route('clients.index');
    }

    public function show($id)
    {
        $client= DB::table('clients')
            ->where('id', $id)
            ->first();
        $cars = DB::table('clients')
            ->join('cars', 'clients.id', '=', 'cars.client_id')
            ->where('clients.id', $id)
            ->select('brand', 'model', 'color', 'number', 'parking', 'cars.id as carId')
            ->get();
        return view('client.show', compact('client', 'cars'));
    }

    public function edit ($id)
    {
        $client= DB::table('clients')
            ->where('id', $id)
            ->first();
        return view('client.edit', compact('client'));
    }

    public function update (Request $request, $id)
    {
        $this->validate($request, [
            'client.name' => 'min:3|unique:clients,name,' . $id,
            'client.phone' => 'numeric|unique:clients,phone,' . $id,
            'client.address' => 'min:3',
        ]);
        $client = $request->input('client');
        DB::table('clients')
            ->where('id', $id)
            ->update(['name' => $client['name'], 'gender' => $client['gender'], 'phone' => $client['phone'], 'address' => $client['address']]);
        return redirect()
            ->route('clients.show', ['id' => $id]);
    }

    public function destroy ($id)
    {
        DB::table('clients')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('clients.index');
    }

}
