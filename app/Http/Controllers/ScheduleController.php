<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Acara;
use App\Order;
use App\Courses;
use App\Item;

class ScheduleController extends Controller
{
    public function index(){
    	// $data['schedule'] = Order::join('acara','orders.id','=','acara.order_id')->get();
    	// $data['schedule'] = Order::with('acaras')->get();
    	$data['acaras'] = Acara::with('order')->get();
    	$data['items'] = Item::with('item_list','order')->get();
    	$data['courses'] = Courses::get();
      	$data["login"] = request()->login ?? "false";
      	// dd($data);
    	return view('schedule.admin',$data);
    }
}
