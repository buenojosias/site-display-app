<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\App\RedirController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AdminAuth::class, 'create'])->name('admin.login');
    Route::post('admin/login', [AdminAuth::class, 'store']);

    Route::get('/app/redir', RedirController::class);
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function(){
    require __DIR__.'/admin.php';
});

require __DIR__.'/auth.php';
