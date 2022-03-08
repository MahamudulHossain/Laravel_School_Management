<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    use HasFactory;
    public function get_fee_type(){
    	return $this->belongsTo(Fee::class,'fee_id','id');
    }
    public function get_class_name(){
    	return $this->belongsTo(ClassName::class,'class_name_id','id');
    }
}
