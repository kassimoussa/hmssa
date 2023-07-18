<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaboController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\RadioController;
use App\Http\Controllers\VisiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [HomeController::class, 'accueil']);

Route::post('login', [HomeController::class, 'login']);


Route::group(['middleware' => ['logged']], function () {
    Route::get('/index', [HomeController::class, 'index']);
    Route::get('logout', [HomeController::class, 'logout']);

    Route::prefix('personnel')->group(function () {
        Route::get('/', [PersonnelController::class, 'index']);
        Route::get('/create', [PersonnelController::class, 'create']);
        Route::post('/store', [PersonnelController::class, 'store']);
        Route::get('/show/{employe}', [PersonnelController::class, 'show']);
        Route::get('/edit/{employe}', [PersonnelController::class, 'edit']);
        Route::put('/update/{employe}', [PersonnelController::class, 'update']);
        Route::delete('/delete/{employe}', [PersonnelController::class, 'destroy']);
    });

    Route::prefix('visites')->group(function () {
        Route::get('/', [VisiteController::class, 'index']);
        Route::get('/events',  [VisiteController::class, 'events']);
        Route::get('/show/{visite}', [VisiteController::class, 'show']);
        Route::get('/consultation/{id}', [VisiteController::class, 'consultation']);
        Route::post('/store', [VisiteController::class, 'store']);
    });

    Route::prefix('administration')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
    });

    Route::prefix('patients')->group(function () {
        Route::get('/', [PatientController::class, 'index']);
        Route::get('/show/{patient}', [PatientController::class, 'show']);
    });

    Route::prefix('laboratoire')->group(function () {
        Route::get('/', [LaboController::class, 'index']);
        Route::get('/show/{examen}', [LaboController::class, 'show']);
    });

    Route::prefix('pharmacie')->group(function () {
        Route::get('/', [PharmacieController::class, 'index']); 
    });

    Route::prefix('radiologie')->group(function () {
        Route::get('/', [RadioController::class, 'index']);
        Route::get('/show/{radio}', [RadioController::class, 'show']);
    });

});

