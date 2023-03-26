<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $fillable = ['id','libelle'];
    public function marques(){
        return $this->hasMany(Car::class,'marque_id');
    }
}
