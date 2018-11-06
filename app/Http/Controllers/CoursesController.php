<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CoursesList;
use App\Courses;
use App\CourseItem;

class CoursesController extends Controller
{
	public function index(){
		$data["courses_lists"] = CoursesList::get();
    	$data["courses"] = Courses::with('courses_list','course_items')->get();
        foreach ($data['courses'] as $c => $course) {
            $course->sum_course_items_price = $course->course_items()->sum('price');
            $course->sum_course_payments_price = $course->course_payments()->sum('price');
        }
        // dd($data);
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
        $course = new Courses;
        $course->fill($request->except('course_items'));
        $course->user_id = Auth::user()->id;
        $course->save();

        if (isset($request['course_items'])) {
            foreach ($request['course_items'] as $ci => $course_item) {
                $db = new CourseItem;
                $db->fill($course_item);
                $db->course_id = $course->id;
                $db->save();       
            }   
        }
        return redirect()-> route('courses.index');
    }

    public function edit($id)
    {
    	$data["courses_lists"] = CoursesList::get();
        $data["courses"] = Courses::with('course_items','course_payments')->find($id);
        // dd($data);
        return view('kursus.edit',$data);
    }

    public function update(Request $request, $id)
    {
        // dd($request);

        $course = Courses::find($id);
        $course->fill($request->except('course_items'));
        $course->update();

        $courses_items = CourseItem::where('course_id',$course->id)->delete();
        if (isset($request['course_items'])) {
            foreach ($request['course_items'] as $ci => $course_item) {
                $db = new CourseItem;
                $db->fill($course_item);
                $db->course_id = $course->id;
                $db->save();       
            }   
        }
        // dd($data['user']);
       return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        Courses::where('id',$id)->delete();
        return redirect()->route('courses.index');
    }

}
