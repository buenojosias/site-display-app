<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Api\{
    AuthController, AdvertisingController, NewsController, QuizController, InformativeController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function(){
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('advertisings', [AdvertisingController::class, 'index']);

Route::get('news', [NewsController::class, 'index']);
Route::get('quizzes/{id}', [QuizController::class, 'getTest']);
Route::get('quizzes', [QuizController::class, 'index']);
Route::get('informatives', [InformativeController::class, 'index']);

Route::post('quizzes/report', [QuizController::class, 'registerRecord']);








Route::get('segments', function(Request $request){
    return \App\Models\Segment::query()
        ->select('id','title')
        ->orderBy('title','asc')
        ->when(
            $request->search,
            fn (Builder $query) => $query
                ->where('title', 'like', "%{$request->search}%")
            )
        ->when(
            $request->exists('selected'),
            fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            fn (Builder $query) => $query->limit(10)
        )
        ->get();
})->name('api.segments');

// Route::get('users', function(Request $request){
//     return \App\Models\User::query()
//         ->select('id','name')
//         ->orderBy('name','asc')
//         ->where('type', 'COMPANY')
//         ->when(
//             $request->search,
//             fn (Builder $query) => $query
//                 ->where('name', 'like', "%{$request->search}%")
//             )
//         ->when(
//             $request->exists('selected'),
//             fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
//             fn (Builder $query) => $query->limit(10)
//         )
//         ->get();
// })->name('api.users');