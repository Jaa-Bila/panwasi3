<?php

use App\Http\Controllers\AttdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/hamil', [HomeController::class, 'adminHamil'])->name('admin.hamil');
    Route::get('/admin/hamil/show/{id}', [HomeController::class, 'adminHamilShow'])->name('admin.hamilShow');
    Route::get('/admin/remaja', [HomeController::class, 'adminRemaja'])->name('admin.remaja');
    Route::get('/admin/arv', [HomeController::class, 'adminArv'])->name('admin.arv');
    Route::get('/admin/oat', [HomeController::class, 'adminOat'])->name('admin.oat');
    Route::get('/admin/register', [HomeController::class, 'adminRegister'])->name('admin.register');
    Route::post('/admin/store', [HomeController::class, 'adminStore'])->name('admin.store');
    Route::post('/admin/reg_hamil', [HomeController::class, 'adminReghamil'])->name('admin.reghamil');
    Route::post('/admin/reg_remaja', [HomeController::class, 'adminRegrem'])->name('admin.regrem');
    Route::post('/admin/reg_oat', [HomeController::class, 'adminRegoat'])->name('admin.regoat');
    Route::post('/admin/reg_arv', [HomeController::class, 'adminRegarv'])->name('admin.regarv');
});

/*------------------------------------------
--------------------------------------------
All manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

/*------------------------------------------
--------------------------------------------
All hamil Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:hamil'])->group(function () {

    Route::get('/hamil/home', [HomeController::class, 'hamilHome'])->name('hamil.home');
    Route::post('/hamil/attd', [AttdController::class, 'hamilAttd'])->name('hamil.attd');
});

/*------------------------------------------
--------------------------------------------
All hamil Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:remaja'])->group(function () {

    Route::get('/remaja/home', [HomeController::class, 'remajaHome'])->name('remaja.home');
});

/*------------------------------------------
--------------------------------------------
All hamil Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:oat'])->group(function () {

    Route::get('/oat/home', [HomeController::class, 'oatHome'])->name('oat.home');
});

/*------------------------------------------
--------------------------------------------
All hamil Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:arv'])->group(function () {

    Route::get('/arv/home', [HomeController::class, 'arvHome'])->name('arv.home');
});
