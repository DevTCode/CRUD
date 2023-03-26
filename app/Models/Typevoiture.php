<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typevoiture extends Model
{
    use HasFactory;
    protected $fillable = ['id','libelle'];
    public function typevoitures(){
        return $this->hasMany(Car::class,'typevoitue_id');
    }
}
