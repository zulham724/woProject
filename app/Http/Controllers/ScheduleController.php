<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Acara;
use App\Order;

class ScheduleController extends Controller
{
    public function index(){
    	$data['schedule'] = Order::join('acara','orders.id','=','acara.order_id')->get();
      $data["login"] = request()->login ?? "false";
      // dd($data);
    	return view('schedule.admin',$data);
    }
}
