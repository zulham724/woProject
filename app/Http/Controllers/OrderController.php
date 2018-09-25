<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Order;
use App\Biodata;
use App\Item;
use App\ItemList;
use App\Acara;
use App\Notification;
use App\Pembayaran;

class OrderController extends Controller
{
    public function index(){
    	$data['orders']=Order::orderBy('created_at','desc')->get();
      $data['items']=Item::with('item_list')->get();
      $data['item_lists']=ItemList::get();
      $data['acara']=Acara::get();
      $data['biodata']=Biodata::get();
      $data['pembayaran']=Pembayaran::get();
        // dd($data);
    	return view('order.index',$data);
    }
    public function create(){

    	return view('order.create');
    }
    public function edit(Request $request){
      $data['order'] = Order::with('items','acaras')->find($request["id"]);
      $data['acara'] = Acara::where('order_id',$request['id'])->get();
      $data['biodata'] = Biodata::where('order_id',$request['id'])->first();
      $data['item'] = Item::where('order_id',$request['id'])->get();
      $data['totalItem'] = Item::where('order_id',$request['id'])->count();
      $data['totalAcara'] = Acara::where('order_id',$request['id'])->count();
      // dd($data);
    	return view('order.edit',$data);
    }
    // end edit
    public function update(Request $request){
      // dd($request);
      $order = Order::find($request["order"]["id"]);
      $order->fill($request["order"]);
      $order->user_id = Auth::user()->id;
      if(isset($request['order']['upload'])){
        $path = $request['order']['upload']->store('order');
        // dd($path);
        $order->upload = $path;
      }
      $order->update();
      // return $order;

      $biodata = Biodata::where("order_id",$order->id)->first();
      $biodata->fill($request["biodata"]);
      $biodata->order_id = $order->id;
      $biodata->update();

      $acara = Acara::where('order_id',$order->id)->delete();

      foreach ($request["acaras"] as $a => $acara) {
        $new = new Acara;
        $new->fill($acara);
        $new->order_id = $order->id;
        $new->save();
      }

      $item = Item::where('order_id',$order->id)->delete();

      foreach ($request["items"] as $i => $item) {
        $new = new Item;
        $new->fill($item);
        $new->order_id = $order->id;
        if(isset($item["image"])){
          $path = $item['image']->store('order');
          // dd($path);
          $new->image = $path;
        }
        $new->save();
      }

      $data['notification'] = Notification::create([
          "title"=>Auth::user()->name,
          "content"=>Auth::user()->name." telah mengedit pesanan",
          "isRead"=>0,
          ]);

      return redirect((Auth::user()->role_id == 1) ? 'admin/order' : 'operator/order' );
    }
    // end update
    public function store(Request $request){
      // dd($request);
    	// dd($request['items'][0]['image']);
      $order = new Order;
      $order->fill($request["order"]);
      $order->user_id = Auth::user()->id;
      if(isset($request['order']['upload'])){
        $path = $request['order']['upload']->store('order');
        // dd($path);
        $order->upload = $path;
      }
      $order->save();
      // return $order;

      $biodata = new Biodata;
      $biodata->fill($request["biodata"]);
      $biodata->order_id = $order->id;
      $biodata->save();

      foreach ($request["acaras"] as $a => $acara) {
        $new = new Acara;
        $new->fill($acara);
        $new->order_id = $order->id;
        $new->save();
      }

      foreach ($request["items"] as $i => $item) {
        $new = new Item;
        $new->fill($item);
        $new->order_id = $order->id;
        if(isset($item["image"])){
          $path = $item['image']->store('order');
          // dd($path);
          $new->image = $path;
        }
        $new->save();
      }

        $data['notification'] = Notification::create([
            "title"=>Auth::user()->name,
            "content"=>Auth::user()->name." telah menerima pesanan",
            "isRead"=>0,
            ]);

    	return redirect('admin/order');
    }
    public function delete(Request $request){
        // dd($request);
        $data['notification'] = Notification::create([
            "title"=>Auth::user()->name,
            "content"=>Auth::user()->name." telah mendelete pesanan",
            "isRead"=>0,
            ]);
        $data['order']=Order::where('id',$request['id'])->delete();
        // $data['file']=Storage::delete(storage_path().'/app/'.$request['file']);
        // dd(storage_path()."/app/".$request['file']);

        return redirect('admin/order');
    }
}
