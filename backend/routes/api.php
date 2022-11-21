<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,TaskController};

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/ping', function (){return ['pong' => true];}); //teste rota

Route::get('/unauthenticated', function (){
    return response()->json('Usuario nao logado!', 400);
})->name('login');

Route::prefix('auth')->group(function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::prefix('/')->middleware('auth:sanctum')->group(function () {
//Route::prefix('/')->group(function () {

    Route::prefix('auth')->group(function() {
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
    });

    Route::prefix('task')->group(function() {
        Route::post('/', [TaskController::class, 'create'])->name('task.create');
        Route::get('/', [TaskController::class, 'all'])->name('task.all');
        Route::get('/active', [TaskController::class, 'active'])->name('task.active');
        Route::get('/inative', [TaskController::class, 'inative'])->name('task.inative');
        Route::get('/{cod}', [TaskController::class, 'show'])->name('task.show');
        Route::put('/{cod}', [TaskController::class, 'store'])->name('task.store');
        Route::delete('/{cod}', [TaskController::class, 'destroy'])->name('task.destroy');
        Route::post('/search', [TaskController::class, 'search'])->name('task.search');
    });

});
