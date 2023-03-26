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
        protected $filiable =['idLocation',	'user_id'	,'car_id'	,'dateL'	,'dateR'];

        public static function  s1($id)
{
    return self::join('users', 'locations.user_id', '=', 'users.id')
        ->select('locations.*')
        ->where('users.id', '=', $id)
        ->get();
}
}
