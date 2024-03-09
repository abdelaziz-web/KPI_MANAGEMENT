<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employecontro;
use App\Http\Controllers\indicacontro;
use App\Http\Controllers\periocontroller;
use App\Http\Controllers\procontroller;
use App\Http\Controllers\Tableau_indicateur ;
use App\Http\Controllers\admin ;
use App\Http\Controllers\AOS ;


  Route::get('/', [employecontro::class,'index1'])->name('connexion');
  Route::post('/auth', [employecontro::class,'index2'])->name('auth');
  Route::get('/profile/{id}', [employecontro::class,'index3'])->name('profile');
  Route::get('/indica', [indicacontro::class,'form_creat'])->name('indica');
  Route::get('/inserer_reel', [indicacontro::class,'show_saisie'])->name('inserer_reel');
  Route::get('/inserer_taux', [indicacontro::class,'show_show'])->name('inserer_taux');
  Route::post('/saisie', [indicacontro::class,'saisie'])->name('saisie'); 
  Route::get('/table\{indice}\{type}', [Tableau_indicateur::class,'table'])->name('table');
  Route::get('/pagination/{indice}', [indicacontro::class,'pagination'])->name('pagination'); 
  Route::post('/storing', [indicacontro::class,'store'])->name('store');
  Route::get('/logout',[employecontro::class,'logout'])->name('logout');
  Route::get('/insérer_employe/{id?}',[employecontro::class,'form_inserer'])->name('employe.inserer');
  Route::post('/insérer_employe_reussi',[employecontro::class,'forminserer'])->name('employe.reussi');
  Route::get('/insérer_periode',[periocontroller::class,'show'])->name('periode.inserer');
  Route::get('/insérer_pro',[procontroller::class,'show'])->name('pro.inserer');
  Route::post('/insérer_periode_réussi',[periocontroller::class,'forminserer'])->name('forminserer');
  Route::post('/insérer_pro_réussi',[procontroller::class,'forminserer'])->name('forminsererpro');
  Route::post('/nouveau',[indicacontro::class,'nouvaeau'])->name('nouveau');
  Route::post('/nouvaeau_taux',[indicacontro::class,'nouvaeau_taux'])->name('nouvaeau_taux');
  Route::get('/admin_users',[admin::class,'afficher'])->name('afficher');
  Route::get('/admin',[admin::class,'index1'])->name('admin'); 
  Route::get('/supprimer/{id}', [admin::class,'supprimer'])->name('supprimer');
  Route::get('/admin/indice',[admin::class,'indice_management'])->name('metrics'); 
  Route::get('/admin/objectiv',[AOS::class,'index_1'])->name('all');
  Route::get('/admin/objectiv_1',[AOS::class,'index_2'])->name('objectiv_1');
  Route::get('/admin/objectiv_2',[AOS::class,'index_3'])->name('objectiv_2');
  Route::post('/admin/saisie',[AOS::class,'index_4'])->name('saisie_2');
  Route::post('/admin/saisie',[AOS::class,'index_4'])->name('saisie_2');
  Route::post('/admin/index5',[AOS::class,'index5'])->name('index5');
 
 // Route::get('/logout',[procontroller::class,''])->name('pro.inserer');
 // Route::get('/logout',[periocontroller::class,''])->name('perio.inserer');

 