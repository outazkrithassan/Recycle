<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageAcceuilControleur;
use App\Http\Controllers\PageProfaliControleur;
use App\Http\Controllers\PageInformationControleur;
use App\Http\Controllers\PageAjouterControleur;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ModifierPasswordControlle;
use App\Events\NewMessage;
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
    return view('pagelogin');
});
Route::get('/pagelogin',[CustomAuthController::class,'pagelogin'] );
Route::post('/login-personne',[CustomAuthController::class,'loginpersonne'] )->name('login-personne');
Route::get('/pageinsc',[CustomAuthController::class,'pageinsc'] );
Route::post('/register-insc',[CustomAuthController::class,'registerInsc'] )->name('register-insc');
Route::get('/pagepassword',[ModifierPasswordControlle::class,'Modifier'] );
Route::post('/pagepassword',[CustomAuthController::class,'Modifierpassword'] )->name('modifier-passeword');
Route::get('/pageacceuil', [PageAcceuilControleur::class,'pageacceuil'])->name('page-acceuil');
Route::get('/pageprofail',[PageProfaliControleur::class,'index'] )->name('page-profaill');;
Route::get('/pageprofail',[PageProfaliControleur::class,'pageprofaill'] )->name('page-profaill');
Route::get('/pageinfo/{id}',[PageInformationControleur::class,'index'] )->name('page-info');
Route::get('/pageajouter',[PageAjouterControleur::class,'index'] )->name('page-ajouter');
Route::post('/donner-ajouter',[PageAjouterControleur::class,'donnerajouter'] )->name('donner-ajouter');
Route::post('edit-objet/{id}',[PageProfaliControleur::class,'delate'] )->name('delete-objet');
Route::get('edit-objet/{id}',[PageProfaliControleur::class,'editobjet'] );
Route::put('/edit-objet',[PageProfaliControleur::class,'update'] )->name('update-objet');
Route::post('/message' , [ PageInformationControleur::class , "message" ] )->name('message') ;
Route::get('/message' , [ PageInformationControleur::class , "indexMessage" ] )->name('message') ;
Route::get('/objet/messages/{id}' , [ PageInformationControleur::class , "messageObjet" ] )->name('objet-message') ;
Route::get('/lire-message/{sender_id}/{objet_id}' , [ PageInformationControleur::class , "viewMessage" ] )->name('lire-message') ;
Route::get('/show-message/{sender_id}/{objet_id}' , [ PageInformationControleur::class , "showMessage" ] )->name('show-message') ;
Route::post('/send-response' , [ PageInformationControleur::class , "repondre" ] ) ;
