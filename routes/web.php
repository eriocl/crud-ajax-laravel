<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/clients/{id}/cars', [ApiController::class, 'getCars'])
    ->name('api.clients.cars.show');

Route::get('clients', [ClientController::class, 'index'])
    ->name('clients.index');

Route::get('clients/create', [ClientController::class, 'create'])
    ->name('clients.create');

Route::get('clients/{id}', [ClientController::class, 'show'])
    ->name('clients.show');

Route::get('clients/{id}/edit', [ClientController::class, 'edit'])
    ->name('clients.edit');

Route::post('clients', [ClientController::class, 'store'])
    ->name('clients.store');

Route::patch('clients/{id}', [ClientController::class, 'update'])
    ->name('clients.update');

Route::delete('clients/{id}', [ClientController::class, 'destroy'])
    ->name('clients.destroy');

Route::post('clients/{id}/cars', [CarController::class, 'store'])
    ->name('cars.store');

Route::delete('clients/{id}/cars/{carId}', [CarController::class, 'destroy'])
    ->name('cars.destroy');

Route::patch('cars/{id}/addpark', [CarController::class, 'addParking'])
    ->name('cars.park');

Route::patch('cars/{id}/delpark', [CarController::class, 'removeParking'])
    ->name('cars.unpark');



