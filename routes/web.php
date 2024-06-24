<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    Route::get('/categoriemodifier/{id}' , 'edit');
    Route::post('/categoriemodifierTraitement' , 'update')->name('categoriemodifierTraitement');
});



//LES ROUTES POUR les IDEES
Route::middleware('admin')->controller(IdeeController::class)->group(function (){
    Route::get('/ideesupprimer/{id}' , 'destroy');
    Route::get('/ideemodifier/{id}' , 'edit');
    Route::post('/ideemodifierTraitement' , 'update')->name('ideemodifierTraitement');
    Route::get('/ideedetail/{id}' , 'show');
    Route::get('/ideeAffichage' , 'index');

    
    Route::get('/modifierStatus/{id}' , 'editStatus');
    Route::post('/modifierStatusTraitement' , 'updateStatus')->name('modifierStatusTraitement');
    
}); 

Route::controller(IdeeController::class)->group(function (){
    Route::get('/ideeAjout' , 'create');
    Route::post('/ideeAjoutTraitement' , 'store');
    Route::get('/ideeAffichage' , 'index');
});

// route pour traiter l'action sur les idées
Route::post('/idee/{id}/{action}', [IdeeController::class, 'action'])->name('idee.action');

// route pour mettre à jour l'action d'approuver ou non
Route::post('idee/updateStatus/{id}/{action}', [IdeeController::class, 'updateStatus'])->name('candidatures.updateStatus');
Route::post('/idee/{id}/approuvee', [IdeeController::class, 'updateStatus'])->name('idee.approuvee');
Route::post('/idee/{id}/nonapprouvee', [IdeeController::class, 'updateStatus'])->name('idee.nonapprouvee');

//LES ROUTES POUR les COMMENTAIRES
Route::controller(CommentaireController::class)->group(function (){
    Route::get('/commentaireAjoutTraitement','store');
    Route::get('/commentaireSupprimer/{id}' , 'destroy');
    Route::get('/commentairemodifier/{id}' , 'edit');
    Route::post('/commentairemodifierTraitement' , 'update')->name('commentairemodifierTraitement');
});


//LES ROUTES POUR l'AUTHENTIFICATION
Route::controller(AuthController::class)->group(function (){
    Route::get('/register','register');
    Route::post('register/save', 'registerSave')->name('register.save');
   Route::get('/login', 'login');
   Route::post('/login/save', 'loginSave')->name('login.save');
   Route::post('/logout' ,'logout')->name('logout');
});

