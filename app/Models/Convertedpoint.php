<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convertedpoint extends Model
{
    use HasFactory;
    public function user(){
       return $this->belongsTo(User::class,'user_id');
    }

    public function countCoupon(){
        $count_coupon = Coupon::where('point_id',$this->id)->count();
        if($count_coupon == 0){
            return true;
        }
        else{
            return false;
        }
    }
}
