<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Livewire\Assets\AssetForm;
use App\Http\Livewire\Assets\AssetIndex;
use App\Http\Livewire\Assets\AssetTrash;
use App\Http\Livewire\Assets\ShowAsset;
use App\Http\Livewire\Contractors\ContractorIndex;
use App\Http\Livewire\Contractors\ContractorTrash;
use App\Http\Livewire\Departments\DepartmentIndex;
use App\Http\Livewire\Departments\DepartmentTrash;
use App\Http\Livewire\Hospitals\HospitalIndex;
use App\Http\Livewire\Hospitals\HospitalTrash;
use App\Http\Livewire\Locations\LocationIndex;
use App\Http\Livewire\Locations\LocationTrash;
use App\Http\Livewire\Manufacturers\ManufacturerIndex;
use App\Http\Livewire\Manufacturers\ManufacturerTrash;
use App\Http\Livewire\Tasks\TaskIndex;
use App\Http\Livewire\Tasks\TaskTrash;
use App\Http\Livewire\Users\UserIndex;
use App\Http\Livewire\Users\UserTrash;
use App\Http\Livewire\Vendors\VendorIndex;
use App\Http\Livewire\Vendors\VendorTrash;
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

    Route::resource('roles', RoleController::class)->except(['show']);

    // NOTE: change to invokable method & route
    Route::get('/settings', [SettingController::class, 'show'])
        ->name('settings')
        ->can('settings.view');

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

    Route::get('departments', DepartmentIndex::class)
        ->name('departments.index');

    Route::get('departments/trash', DepartmentTrash::class)
        ->name('departments.trash');

    Route::get('contractors', ContractorIndex::class)
        ->name('contractors.index');

    Route::get('contractors/trash', ContractorTrash::class)
        ->name('contractors.trash');

    Route::get('vendors', VendorIndex::class)
        ->name('vendors.index');

    Route::get('vendors/trash', VendorTrash::class)
        ->name('vendors.trash');

    Route::get('hospitals', HospitalIndex::class)
        ->name('hospitals.index');

    Route::get('hospitals/trash', HospitalTrash::class)
        ->name('hospitals.trash');

    Route::get('assets', AssetIndex::class)
        ->name('assets.index');

    Route::get('assets/create', AssetForm::class)
        ->name('assets.create');

    Route::get('assets/trash', AssetTrash::class)
        ->name('assets.trash');

    Route::get('assets/{asset}', ShowAsset::class)
        ->name('assets.show');
});
