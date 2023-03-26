<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typemoteur extends Model
{
    use HasFactory;
    protected $fillable = ['id','libelle'];
    public function typemoteurs(){
        return $this->hasMany(Car::class,'typemoteur_id');
    }
}
