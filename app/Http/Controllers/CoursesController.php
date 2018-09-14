<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
	public function index(){
    
    	return view('kursus.index');
    }

   public function create(){

    	return view('kursus.create');
    }
}
