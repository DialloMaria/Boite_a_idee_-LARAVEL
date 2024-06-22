<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/categorieAjout', [CategorieController::class, 'create']);
Route::post('/categorieAjoutTraitement', [CategorieController::class, 'store']);
Route::get('/categorieAffichage' , [CategorieController::class, 'affichagecategorie']);
Route::get('/categorieSupprimer/{id}' , [CategorieController::class,'destroy']);