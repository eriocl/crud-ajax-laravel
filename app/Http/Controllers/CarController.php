<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'car.number' => 'unique:cars,number|size:6',
        ]);
        $car = $request->input('car');
        DB::table('cars')->insert(['client_id' => $id, 'brand' => $car['brand'], 'model' => $car['model'], 'color' => $car['color'], 'number' => $car['number']]);
        return redirect()->route('clients.show', ['id' => $id]);
    }

    public function destroy($carId, $clientId)
    {
        DB::table('cars')
            ->where('id', '=', $carId)
            ->delete();
        return redirect()->route('clients.show', ['id' => $clientId]);
    }

    public function update($id)
    {
        DB::table('cars')
            ->where('id', $id)
            ->update(['parking' => 0]);
        return redirect()
            ->route('clients.index');
    }
}
