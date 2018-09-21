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
}
