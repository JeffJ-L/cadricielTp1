<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'language', 'etudiant_id'];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
}
