<?php

use App\Http\Controllers\ArvController;
use App\Http\Controllers\AttdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HamilController;
use App\Http\Controllers\OatController;
use App\Http\Controllers\RemajaController;

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
// Route::middleware(['auth', 'user-access:user'])->group(function () {

//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/register', [HomeController::class, 'adminRegister'])->name('admin.register');
    Route::post('/admin/store', [HomeController::class, 'adminStore'])->name('admin.store');

    Route::get('/admin/hamil', [HamilController::class, 'adminHamil'])->name('admin.hamil');
    Route::get('/admin/hamil/show/{id}', [HamilController::class, 'adminHamilShow'])->name('admin.hamilShow');
    Route::get('/admin/hamil/attd/show/{user_id}/{id}', [HamilController::class, 'adminHamilAttend'])->name('admin.hamilAttend');
    Route::post('/admin/reg_hamil', [HamilController::class, 'adminReghamil'])->name('admin.reghamil');

    Route::get('/admin/remaja', [RemajaController::class, 'adminRemaja'])->name('admin.remaja');
    Route::get('/admin/remaja/show/{id}', [RemajaController::class, 'adminRemajaShow'])->name('admin.remajaShow');
    Route::get('/admin/remaja/attd/show/{user_id}/{id}', [RemajaController::class, 'adminRemajaAttend'])->name('admin.remajaAttend');
    Route::post('/admin/reg_remaja', [RemajaController::class, 'adminRegrem'])->name('admin.regrem');

    Route::get('/admin/arv', [ArvController::class, 'adminArv'])->name('admin.arv');
    Route::get('/admin/arv/show/{id}', [ArvController::class, 'adminArvShow'])->name('admin.arvShow');
    Route::get('/admin/arv/attd/show/{user_id}/{id}', [ArvController::class, 'adminArvAttend'])->name('admin.arvAttend');
    Route::post('/admin/reg_arv', [ArvController::class, 'adminRegarv'])->name('admin.regarv');


    Route::get('/admin/oat', [OatController::class, 'adminOat'])->name('admin.oat');
    Route::get('/admin/oat/show/{id}', [OatController::class, 'adminOatShow'])->name('admin.oatShow');
    Route::get('/admin/oat/attd/show/{user_id}/{id}', [OatController::class, 'adminOatAttend'])->name('admin.oatAttend');
    Route::post('/admin/reg_oat', [OatController::class, 'adminRegoat'])->name('admin.regoat');
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

    Route::get('/hamil/home', [HamilController::class, 'hamilHome'])->name('hamil.home');
    Route::post('/hamil/attd', [AttdController::class, 'hamilAttd'])->name('hamil.attd');
    Route::get('/hamil/attd/show/{user_id}/{id}', [AttdController::class, 'hamilAttdShow'])->name('hamil.attdShow');
});

/*------------------------------------------
--------------------------------------------
All hamil Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:remaja'])->group(function () {

    Route::get('/remaja/home', [RemajaController::class, 'remajaHome'])->name('remaja.home');
    Route::post('/remaja/attd', [AttdController::class, 'remajaAttd'])->name('remaja.attd');
    Route::get('/remaja/attd/show/{user_id}/{id}', [AttdController::class, 'remajaAttdShow'])->name('remaja.attdShow');
});

/*------------------------------------------
--------------------------------------------
All hamil Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:oat'])->group(function () {

    Route::get('/oat/home', [OatController::class, 'oatHome'])->name('oat.home');
    Route::post('/oat/attd', [AttdController::class, 'oatAttd'])->name('oat.attd');
    Route::get('/oat/attd/show/{user_id}/{id}', [AttdController::class, 'oatAttdShow'])->name('oat.attdShow');
});

/*------------------------------------------
--------------------------------------------
All hamil Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:arv'])->group(function () {

    Route::get('/arv/home', [ArvController::class, 'arvHome'])->name('arv.home');
    Route::post('/arv/attd', [AttdController::class, 'arvAttd'])->name('arv.attd');
    Route::get('/arv/attd/show/{user_id}/{id}', [AttdController::class, 'arvAttdShow'])->name('arv.attdShow');
});
