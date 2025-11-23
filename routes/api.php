<?php

use App\Http\Controllers\AdminTechnicianDetailController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TechnicianDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum');


//Route::middleware('auth:sanctum')->get('/requests', [RequestController::class, 'index']);
//Route::middleware('auth:sanctum')->get('/requests/{id}', [RequestController::class, 'show']);
//Route::middleware('auth:sanctum')->delete('/requests/{id}', [RequestController::class, 'destroy']);
//Route::middleware('auth:sanctum')->post('/requests/{id}', [RequestController::class, 'update']);
//Route::middleware('auth:sanctum')->post('/requests', [RequestController::class, 'store']);
//Route::group('prefix:')
Route::middleware('auth:sanctum')->group(function () {
Route::get('/requests', [RequestController::class, 'index']);
Route::get('/requests/{id}', [RequestController::class, 'show']);
Route::post('/requests', [RequestController::class, 'store']);
Route::put('/requests/{id}', [RequestController::class, 'update']);
Route::delete('/requests/{id}', [RequestController::class, 'destroy']);

});

Route::middleware(['auth:sanctum','role:technician'])->group(function () {
    Route::get ('/technician-details', [TechnicianDetailController::class, 'index']);
    Route::patch('/technician-details', [TechnicianDetailController::class, 'update']);
});

Route::middleware(['auth:sanctum','role:admin'])->prefix('admin')->group(function () {
    Route::get   ('/technician-details',        [AdminTechnicianDetailController::class, 'index']);
    Route::post  ('/technician-details',        [AdminTechnicianDetailController::class, 'store']);
    Route::get   ('/technician-details/{id}',   [AdminTechnicianDetailController::class, 'show']);
    Route::patch ('/technician-details/{id}',   [AdminTechnicianDetailController::class, 'update']);
    Route::delete('/technician-details/{id}',   [AdminTechnicianDetailController::class, 'destroy']);

   
});
 Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/regions',  [RegionController::class, 'index']);

