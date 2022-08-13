<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Company\{ CompanyList, CompanyCreate };
use App\Http\Livewire\Admin\Driver\{ DriverList, DriverCreate };
use App\Http\Livewire\Admin\Advertising\{ AdvertisingList };

use App\Http\Controllers\Admin\{ CompanyController, DriverController };

Route::get('/', function () {
    return view('dashboard');
})->name('admin.index');

Route::get('/empresas', CompanyList::class)->name('admin.companies.list');
Route::get('/empresas/cadastro', CompanyCreate::class)->name('admin.companies.create');
Route::get('/empresas/{company}', [CompanyController::class, 'show'])->name('admin.companies.show');
Route::get('/empresas/{id}/campanhas', [CompanyController::class, 'advertisings'])->name('admin.companies.advertisings');

Route::get('/motoristas', DriverList::class)->name('admin.drivers.list');
Route::get('/motoristas/cadastro', DriverCreate::class)->name('admin.drivers.create');
Route::get('/motoristas/{driver}', [DriverController::class, 'show'])->name('admin.drivers.show');

Route::get('/campanhas', AdvertisingList::class)->name('admin.advertisings.list');
