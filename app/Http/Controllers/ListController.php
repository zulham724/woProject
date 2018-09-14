<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Order;
use App\Biodata;
use App\Item;
use App\Acara;
use App\Notification;
use App\Pembayaran;

class ListController extends Controller
{
    public function index(){
    
    	return view('list.index');
    }
}
