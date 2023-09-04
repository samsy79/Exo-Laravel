<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableauController;
use App\Http\Controllers\TeachController;
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


/* Route::get('/', function () {
    return view('tableau');
});*/


Route::controller(TableauController::class)->middleware('auth')->group(function(){
    Route:: get('/',"index")->name("index");
    Route::get('/profil', function (){
        return view('profil');
    });
    Route:: get('/Tableau/{id}',"show")->name("indexWithId");
    Route ::post ('tableau/store',"store")->name("tableauStore");
    Route::post('tableau/{id}','status')->name('status');
    Route::get('tableau/{id}', "delete")->name('delete');
});
Route::controller(TeachController::class)->middleware('auth')->group(function(){
    Route::get('/teachProfil', function () {
        return view('teachProfil');
    });
    Route:: get('/tableEnseign',"indexEns")->name("indexEns");
    Route:: get('/teachProfil/{id}',"show")->name("indexWithIdE");
    Route ::post ('tableaux/store',"store")->name("tableauEnsStore");
    Route::get('tableaux/{id}', "AffecterCours")->name('AffecterCours');
    Route::post('tableau/{id}','status')->name('status');
    Route::get('tableau/{id}', "delete")->name('delete');
});

Route::get('/modif/{id}', [TableauController::class,"edit"])->name('edit');
Route::patch('/modif/{id}', [TableauController::class,"update"])->name('update');

Route::controller(UserController::class)->prefix('user')->group(function(){
    Route:: get('/login',"login")->name("login");
    Route:: post('/authentification',"authentification")->name("authentification");
    Route:: get('/register',"register")->name("register");
    Route::post('store/register','store')->name('storeUser');
    Route::get('/verify_email/{email}','verify')->name('verifyEmail');
    Route::get('/email_forgot','emailForgot')->name('emailForgot');
    Route::post('/emailVerify','emailVerify')->name('emailVerify');
    Route::post('/email_change','emailChange')->name('emailChange');
    Route::get('/verify/{email}','modif_pass')->name('modif_pass');
    Route::post ('/authentification','authentification')->name('authentification');
    Route::get('/logout','logout')->name('logout');

});




