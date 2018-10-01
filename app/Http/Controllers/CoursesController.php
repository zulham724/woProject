<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CoursesList;
use App\Courses;

class CoursesController extends Controller
{
	public function index(){
		$data["courses_lists"] = CoursesList::get();
    	$data["courses"] = Courses::with('courses_list')->get();
    	return view('kursus.index',$data);
    }

   public function create(){
		$data["courses_lists"] = CoursesList::get();
		// dd($data);
    	return view('kursus.create',$data);
    }

    public function store(Request $request)
    {
    	// dd($request);
        $courses = new Courses;
        $courses->fill($request->all());
        $courses->user_id = Auth::user()->id;
        $courses->save();
        return redirect()-> route('courses.index');
    }

    public function edit($id)
    {
    	$data["courses_lists"] = CoursesList::get();
        $data["courses"] = Courses::find($id);
        // dd($data);
        return view('kursus.edit',$data);
    }

    public function update(Request $request, $id)
    {
        // dd($request);

        $courses = Courses::find($id);
        $courses->fill($request->all());
        $courses->update();
        // dd($data['user']);
       return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        Courses::where('id',$id)->delete();
        return redirect()->route('courses.index');
    }

}
