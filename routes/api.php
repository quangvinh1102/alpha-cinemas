<?php

use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\client\Auth\LoginClientController;
use App\Http\Controllers\client\MovieControler;
use App\Http\Controllers\client\SeatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/admin/login', [LoginAdminController::class, 'login']);

Route::middleware(['auth:sanctum' , 'auth:admin' ])->group(function () {

    Route::get('/admin', [UserAdminController::class, 'getAdmin']);
    Route::get('/admin/logout', [UserAdminController::class, 'logoutAdmin']);

    Route::get('/admin/index', [UserAdminController::class, 'indexAdmin']);
    Route::post('/admin/create', [UserAdminController::class, 'storeAdmin']);
    Route::get('/admin/{id}/edit', [UserAdminController::class, 'getAdminById']);
    Route::put('/admin/{id}', [UserAdminController::class, 'updateAdmin']);

    
    Route::get('/user/index', [UserAdminController::class, 'indexUser']);
    Route::get('/user/{id}/edit', [UserAdminController::class, 'getUserById']);
    Route::put('/user/{id}', [UserAdminController::class, 'updateUser']);


    Route::get('/room/index', [RoomController::class, 'index']);
    Route::post('/room/create', [RoomController::class, 'create']);
    Route::get('/room/{id}/edit', [RoomController::class, 'edit']);
    Route::put('/room/{id}', [RoomController::class, 'update']);
    Route::delete('/room/{id}', [RoomController::class, 'delete']);

    Route::get('/category/index', [CategoryController::class, 'index']);
    Route::post('/category/create', [CategoryController::class, 'store']);
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);

    Route::get('/movie/index', [MovieController::class, 'index']);
    Route::get('/movie/create', [MovieController::class, 'create']);
    Route::post('/movie', [MovieController::class, 'store']);
    Route::get('/movie/{id}/edit', [MovieController::class, 'edit']);
    Route::put('/movie/{id}', [MovieController::class, 'update']);
    Route::delete('/movie/{id}', [MovieController::class, 'delete']);

    Route::get('/schedule/index', [ScheduleController::class, 'index']);
    Route::get('/schedule/create', [ScheduleController::class, 'create']);
    Route::post('/schedule', [ScheduleController::class, 'store']);
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'edit']);
    Route::put('/schedule/{id}', [ScheduleController::class, 'update']);
    Route::delete('/schedule/{id}', [ScheduleController::class, 'delete']);

});


//Client routes



Route::post('/client/login', [LoginClientController::class, 'login']);
Route::post('/user/create', [LoginClientController::class, 'register']);
Route::middleware(['auth:sanctum', 'auth:user'])->group(function () {
    Route::get('/user/info', [LoginClientController::class, 'getUser']);
    Route::get('/user/logout', [LoginClientController::class, 'logout']);
});
Route::get('/client/movie/index', [MovieControler::class, 'index']);
Route::get('/client/movie/{slug}/show', [MovieControler::class, 'movieBySlug']);
Route::get('/client/movie/seat', [SeatController::class, 'index']);
