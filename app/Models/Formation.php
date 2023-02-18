<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'duree',
        'description',
        'istarted',
        'dateDebut',       
    ];

    public function candidat(){
        return $this->BelongsToMany(candidat::class);
    }
    public function refernetiel(){
        return $this->belongsToMany(referentiel::class);
    }
}
