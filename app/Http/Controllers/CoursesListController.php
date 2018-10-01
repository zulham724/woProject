<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoursesList;

class CoursesListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["courses_lists"] = CoursesList::get();
        return view('courseslist.index',$data);
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
        $data['courses_lists']= CoursesList::create([
            "type"=>$request['type'],
            "price"=>$request['price'],
        ]);
        return redirect()-> route('courseslists.index');
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
        $data["courses_list"] = CoursesList::find($id);
        return view('courseslist.edit',$data);
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
        // dd($request);
        $data["courses_lists"]=CoursesList::where('id',$request['id'])
        ->update([
            'type' => $request['type'],
            'price' => $request['price'],
            
        ]);
        // dd($data['user']);
       return redirect()->route('courseslists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CoursesList::where('id',$id)->delete();
        return redirect()-> route('courseslists.index');
    }
}
