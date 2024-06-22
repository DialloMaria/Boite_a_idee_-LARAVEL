<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;

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



//LES ROUTES POUR les IDEES
Route::controller(IdeeController::class)->group(function (){
    Route::get('/ideeAjout' , 'create');
    Route::post('/ideeAjoutTraitement' , 'store');
    Route::get('/ideeAffichage' , 'index');
    Route::get('/ideesupprimer/{id}' , 'destroy');
    Route::get('/ideemodifier/{id}' , 'edit');
    Route::post('/ideemodifierTraitement' , 'update')->name('ideemodifierTraitement');
    Route::get('/ideedetail/{id}' , 'show');
});

//LES ROUTES POUR les COMMENTAIRES
Route::controller(CommentaireController::class)->group(function (){
    Route::get('/commentaireAjoutTraitement','store');
    Route::get('/commentaireSupprimer/{id}' , 'destroy');
    Route::get('/commentairemodifier/{id}' , 'edit');
    Route::post('/commentairemodifierTraitement' , 'update')->name('commentairemodifierTraitement');
});
