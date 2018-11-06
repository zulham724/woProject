<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Courses extends Model
{
    protected $table = "courses";
    protected $guarded = ["id"];

    public function courses_list(){
    	return $this->belongsTo('App\CoursesList');
    }

    public function course_items(){
    	return $this->hasMany('App\CourseItem','course_id','id');
    }

    public function course_payments(){
    	return $this->hasMany('App\CoursePayment','course_id','id');
    }
}
