<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListCoursesController extends Controller
{
    public function index(){
    
    	return view('list_kursus.index');
    }
}
