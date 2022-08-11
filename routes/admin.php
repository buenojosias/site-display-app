<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Company\{ CompanyList, CompanyCreate };
use App\Http\Livewire\Admin\Driver\{ DriverList, DriverCreate };

use App\Http\Controllers\{ CompanyController };

Route::get('/', function () {
    return view('dashboard');
})->name('admin.index');

Route::get('/empresas', CompanyList::class)->name('admin.companies.list');
Route::get('/empresas/cadastro', CompanyCreate::class)->name('admin.companies.create');
Route::get('/empresas/{company}', [CompanyController::class, 'show'])->name('admin.companies.show');

Route::get('/motoristas', DriverList::class)->name('admin.drivers.list');
Route::get('/motoristas/cadastro', DriverCreate::class)->name('admin.drivers.create');

Route::get('/campanhas', function () {
    return view('dashboard');
})->name('admin.ads.index');
