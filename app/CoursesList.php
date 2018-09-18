<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesList extends Model
{
    protected $table = "courses_lists";
    protected $fillable = ['type','price'];
}
