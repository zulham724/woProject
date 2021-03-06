<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoursePayment;
use App\Courses;

class CoursePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["courses"] = Courses::with('course_payments','course_items')->get();
        foreach ($data['courses'] as $c => $course) {
            $course->sum_course_items_price = $course->course_items()->sum('price');
            $course->sum_course_payments_price = $course->course_payments()->sum('price');
        }
        return view('coursepayment.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coursepayment = new CoursePayment;
        $coursepayment->fill($request->all());
        $coursepayment->save();
        return redirect()->route('coursepayments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coursepayment = CoursePayment::find($id)->delete();
        return response()->json($coursepayment);
    }
}
