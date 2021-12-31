<?php

use App\Http\Controllers\SettingController;
use App\Http\Livewire\Locations\LocationIndex;
use App\Http\Livewire\Locations\LocationTrash;
use App\Http\Livewire\Manufacturers\ManufacturerIndex;
use App\Http\Livewire\Manufacturers\ManufacturerTrash;
use App\Http\Livewire\Tasks\TaskIndex;
use App\Http\Livewire\Tasks\TaskTrash;
use App\Http\Livewire\Users\UserIndex;
use App\Http\Livewire\Users\UserTrash;
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
    Route::get('users', UserIndex::class)
        ->name('users.index');

    Route::get('users/trash', UserTrash::class)
        ->name('users.trash');

    Route::get('locations', LocationIndex::class)
        ->name('locations.index');

    Route::get('locations/trash', LocationTrash::class)
        ->name('locations.trash');

    Route::get('manufacturers', ManufacturerIndex::class)
        ->name('manufacturers.index');

    Route::get('manufacturers/trash', ManufacturerTrash::class)
        ->name('manufacturers.trash');

    Route::get('tasks', TaskIndex::class)
        ->name('tasks.index');

    Route::get('tasks/trash', TaskTrash::class)
        ->name('tasks.trash');

});
