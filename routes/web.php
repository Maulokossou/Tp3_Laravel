<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Etudiant;
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
Route::get('/',[Etudiant::class, "index"])->name("accueil");

Route::get('/profil/{id?}',[Etudiant::class, "seeMore"])->name("VoirPlus");

Route::post('/profil/store',[Etudiant::class, "store"])->name('profilStore');

Route::get('/supprimer/{id}',[Etudiant::class, "supprimer"])->name("delete");

Route::get('/modify/{id}',[Etudiant::class, "modifyForm"])->name("mode");


Route::post('/updateStudentInformation/{id}',[Etudiant::class, "update"])->name("envoie");

Route::post('/activate/{id}', [Etudiant::class, 'activate'])->name('activate');

Route::post('/deactivate/{id}', [Etudiant::class, 'deactivate'])->name('deactivate');
