<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Company\{ CompanyList, CompanyCreate };
use App\Http\Livewire\Admin\Driver\{ DriverList };

Route::get('/', function () {
    return view('dashboard');
})->name('admin.index');

Route::get('/empresas', CompanyList::class)->name('admin.companies.list');
Route::get('/empresas/cadastro', CompanyCreate::class)->name('admin.companies.create');

Route::get('/motoristas', DriverList::class)->name('admin.drivers.list');

Route::get('/campanhas', function () {
    return view('dashboard');
})->name('admin.ads.index');
