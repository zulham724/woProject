<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;
use App\User;

class UserController extends Controller
{
    public function admin(){

        return view('admin/admin');
    }
    public function index(){
        $data['users']=role::join('users','roles.id','=','users.role_id')->get();
        // dd($data['users']);
        return view('admin.index',$data);
    }
    public function edit($id){
      $data['role']=role::get();
      $data['user'] = User::find($id);
      // dd($data['user']);
        return view('admin.edit',$data);
    }
    public function destroy($id){
        // dd($request);
        User::find($id)->delete();
        return redirect()->route('users.index');
    }
    public function create(){
        $data['role']=role::get();
        return view('admin.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role'=> 'required',
            ]);
        $data['user']=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id'=> $request['role']
        ]);
        // dd($data['user']);
        return redirect()->route('users.index');
    }
    public function update(Request $request,$id){
        $data['user']=User::find($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id'=> $request['role']
        ]);
        // dd($data['user']);
        return redirect()->route('users.index');
    } 
}
