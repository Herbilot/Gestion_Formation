<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Candidat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'email',
        'age',
        'niveauEtude',  
        'sexe',     
    ];

    public function formations():BelongsToMany{
        return $this->belongsToMany(formation::class, 'candidat_formations');
    }
}
