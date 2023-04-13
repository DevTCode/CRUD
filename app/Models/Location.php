<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public  function user(){
        return $this->belongsTo(User::class);
        }
        public  function car(){
            return $this->hasOne(Car::class);
        }
        public  function fact(){
            return $this->hasOne(Facture::class);
        }
        protected $fillable =['id','user_id','car_id','dateL','dateR'];


}
