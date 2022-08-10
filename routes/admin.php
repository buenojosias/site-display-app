<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\{
    Company\CompanyList
};

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
    return view('dashboard');
})->name('admin.index');

Route::get('/empresas', CompanyList::class)->name('admin.companies.index');

Route::get('/motoristas', function () {
    return view('dashboard');
})->name('admin.drivers.index');
Route::get('/campanhas', function () {
    return view('dashboard');
})->name('admin.ads.index');
