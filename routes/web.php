<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\SuratinController;
use App\Http\Controllers\API\SuratoutController;
use App\Http\Controllers\API\UsermanageController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\SuratinuserController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboardjet', function () {
    return view('dashboard');
})->name('dashboardjet');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

// Route::group(['middleware' => 'auth'], function() {

//     Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
//         Route::resource('master', \App\Http\Controllers\Admin\AdminController::class);
//     });

//     Route::group(['middleware' => 'role:user', 'prefix' => 'user', 'as' => 'user.'], function() {
//         Route::resource('pengguna', \App\Http\Controllers\User\UserController::class);
//     });
// });

