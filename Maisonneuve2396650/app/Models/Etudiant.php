<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'ville_id',
        'email',
        'telephone',
        'adresse',
        'date_de_naissance',
    ];

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
