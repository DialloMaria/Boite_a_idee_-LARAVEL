<?php

namespace App\Models;

use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idee extends Model
{
    use HasFactory;

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function commentaire(){
        return $this->hasMany(Commentaire::class);
    }
}
