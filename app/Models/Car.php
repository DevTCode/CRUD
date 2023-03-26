<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['image_id','typemoteur_id','typevoiture_id','marque_id','Prix','disponibilite','numero_chassis'];
    public  function marque(){
        return $this->belongsTo(Marque::class);
        }
    public  function typemoteur(){
        return $this->belongsTo(Typemoteur::class);
        }
    public  function typevoiture(){
        return $this->belongsTo(Typevoiture::class);
        }
    public  function iamge(){
        return $this->belongsTo(Image::class);
        }
}
