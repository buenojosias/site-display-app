<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Company\{ CompanyCreate };
use App\Http\Livewire\Driver\{ DriverCreate };

use App\Http\Livewire\Admin\Company\{ CompanyList };
use App\Http\Livewire\Admin\Driver\{ DriverList };
use App\Http\Livewire\Admin\Advertising\{ AdvertisingList, AdvertisingCreate };
use App\Http\Livewire\Admin\Informative\{ InformativeList, InformativeCreate };
use App\Http\Livewire\Admin\Transaction\{ TransactionDriver };

use App\Http\Controllers\Admin\{ CompanyController, DriverController, AdvertisingController, RecordController };

Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin.index');

Route::get('/empresas', CompanyList::class)->name('admin.companies.list');
Route::get('/empresas/cadastro', CompanyCreate::class)->name('admin.companies.create');
Route::get('/empresas/{company}', [CompanyController::class, 'show'])->name('admin.companies.show');
Route::get('/empresas/{company}/editar/{secao?}', [CompanyController::class, 'edit'])->name('admin.companies.edit');
Route::get('/empresas/{id}/campanhas', [CompanyController::class, 'advertisings'])->name('admin.companies.advertisings');

Route::get('/motoristas', DriverList::class)->name('admin.drivers.list');
Route::get('/motoristas/cadastro', DriverCreate::class)->name('admin.drivers.create');
Route::get('/motoristas/{driver}', [DriverController::class, 'show'])->name('admin.drivers.show');
Route::get('/motoristas/{driver}/editar/{secao?}', [DriverController::class, 'edit'])->name('admin.drivers.edit');
Route::get('/motoristas/{driver}/exibicoes', [DriverController::class, 'displays'])->name('admin.drivers.displays');

Route::get('/campanhas', AdvertisingList::class)->name('admin.advertisings.list');
Route::get('/campanhas/nova', AdvertisingCreate::class)->name('admin.advertisings.create');
Route::get('/campanhas/{advertising}', [AdvertisingController::class, 'show'])->name('admin.advertisings.show');
Route::get('/campanhas/{advertising}/exibicoes', [AdvertisingController::class, 'displays'])->name('admin.advertisings.displays');

Route::get('/informativos', InformativeList::class)->name('admin.informatives.list');
Route::get('/informativos/novo', InformativeCreate::class)->name('admin.informatives.create');

Route::get('/relatorios/{secao?}', [RecordController::class, 'index'])->name('admin.records');