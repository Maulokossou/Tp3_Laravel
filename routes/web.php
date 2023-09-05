<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Etudiant;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\AffectationEtudiantController;
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

Route::controller(Etudiant::class)->group(function(){
    Route::get('/', "index")->name("index");
    Route::get('/profil/{id?}', "seeMore")->name("VoirPlus");
    Route::post('/profil/store', "store")->name('profilStore');
    Route::get('/modify/{id}', "modifyForm")->name("mode");
    Route::get('/supprimer/{id}', "supprimer")->name("delete");
    Route::post('/updateStudentInformation/{id}', "update")->name("envoie");
    Route::post('/user/{id}','activate')->name('activate');
});

Route::controller(CoursController::class)->group(function(){
    Route::get('/courshome', "courshome")->name("courshome");
    Route::get('/addcours', "addcours")->name("addcours");
    Route::post('/cours/store', "accumulation")->name('coursStore');
    Route::get('/addCategorie', "addCategorie")->name("addCategorie");
    Route::post('/newCategorie', "newCategorie")->name("newCategorie");
    Route::get('/supprimer/{id}', "supprimer")->name("delete");
    Route::post('/updateStudentInformation/{id}', "update")->name("update");
    Route::get('/modify/{id}', "modifyForm")->name("mode");
});

Route::controller(EnseignantsController::class)->group(function(){
    Route::get('/enseignanthome', "enseignanthome")->name("enseignanthome");
    Route::get('/addenseignant', "addenseignant")->name("addenseignant");
    Route::post('/accumulation', "accumulation")->name("enseignantStore");
    Route::get('/supprimer/{id}', "supprimer")->name("delete");
});
Route::controller(AffectationController::class)->group(function(){
    Route::get('/affectationCours{id?}', "affectation")->name("affectationCours");
    Route::get('/assigner', "assigner")->name("assigner");
    Route::get('/affectCours', "affectCours")->name("affectCours");
    Route::post('/storeEnseignant/{id}', "storeEnseignant")->name("storeEnseignant");
    Route::post('/enseignant/{enseignantId}/affectations', "showAffectations")->name("showAffectations");
    Route::get('/supprimerAffectation/{enseignantId}/{coursId}', "supprimerAffectation")->name("supprimerAffectation");
});
Route::controller(UserController::class)->prefix('user')->group(function(){
    Route::get('/login',"login")->name("login");
    Route::get('/logout',"logout")->name("logout");
    Route::get('/register',"register")->name("register");
    Route::get('/verify_email/{email}', 'verify')->name('emailCreate'); // Correct
    Route::get('/verifyMail', 'verification')->name('verifyMail');
    Route::post('/store/register',"store")->name("store");
    Route::post('/restor_password/verifyMail', 'restor_password')->name('emailVerify');
    Route::post('/authentification/login', 'authentification')->name('authentification');
    Route::get('/verify_email/{email}', 'verifyPwd')->name('verifyPwd');
    Route::post('/update_pwd/{id}', 'updatePwd')->name('updatePwd');
});
Route::controller(AffectationEtudiantController::class)->prefix('user')->group(function(){
    Route::get('/affectCoursEtudianthome',"affectCoursEtudiant")->name("affectCoursEtudianthome");
    
});

