<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;

// Route::get('/', function () {
//     return view('welcome');
// });

//LES ROUTES POUR CATEGORIES
Route::controller(CategorieController::class)->group(function (){
    Route::get('/categorieAjout','create');
    Route::post('/categorieAjoutTraitement',  'store');
    Route::get('/categorieAffichage' ,  'affichagecategorie');
    Route::get('/categorieSupprimer/{id}' , 'destroy');
});



//LES ROUTES POUR IDEES

Route::controller(IdeeController::class)->group(function (){
    Route::get('/ideeAjout' , 'create');
    Route::post('/ideeAjoutTraitement' , 'store');
});