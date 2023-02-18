<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referentiel extends Model
{
    use HasFactory;
    public function type(){
        return $this->hasOne(type::class);
    }
    public function formation(){
        return $this->BelongsToMany(formation::class);
    }
}
