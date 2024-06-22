<?php

namespace App\Models;

use App\Models\Idee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;


    public function idee(){
        return $this->belongsTo(Idee::class);
    }

}
