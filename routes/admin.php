<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('admin.index');

Route::get('/empresas', App\Http\Livewire\Admin\Company\CompanyList::class)->name('admin.companies.list');
Route::get('/empresas/cadastro', App\Http\Livewire\Admin\Company\CompanyCreate::class)->name('admin.companies.create');

Route::get('/motoristas', function () {
    return view('dashboard');
})->name('admin.drivers.index');
Route::get('/campanhas', function () {
    return view('dashboard');
})->name('admin.ads.index');
