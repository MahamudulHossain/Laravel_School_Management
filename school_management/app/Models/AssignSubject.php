<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;
    public function get_class_name(){
    	return $this->belongsTo(ClassName::class,'class_name_id','id');
    }
    public function get_group_name(){
    	return $this->belongsTo(Group::class,'group_id','id');
    }
    public function get_subject_name(){
    	return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
