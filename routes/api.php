<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\SuratinController;
use App\Http\Controllers\API\SuratoutController;
use App\Http\Controllers\API\UsermanageController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\SuratinuserController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//admin
Route::resource('dashboard', DashboardController::class);
Route::resource('suratmasuk', SuratinController::class);
Route::resource('suratkeluar', SuratoutController::class);
Route::resource('klasifikasisurat', SubjectController::class);
Route::resource('usermanagement', UsermanageController::class);
//user
Route::resource('manageuser', UserController::class);
Route::resource('suratmasukuser', SuratinuserController::class);
