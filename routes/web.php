<?php

use App\Http\Controllers\SettingController;
use App\Http\Livewire\Locations\LocationIndex;
use App\Http\Livewire\Locations\LocationTrash;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // NOTE: change to invokable method & route
    Route::get('/settings', [SettingController::class, 'show'])
        ->name('settings');

    // Livewire Routes
    Route::get('locations', LocationIndex::class)
        ->name('locations.index');

    Route::get('locations/trash', LocationTrash::class)
        ->name('locations.trash');

});
