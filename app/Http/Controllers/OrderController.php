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
    public function edit($id){
      $data['order'] = Order::with('items.item_list','acaras')->find($id);
      $data['acara'] = Acara::where('order_id',$id)->get();
      $data['biodata'] = Biodata::where('order_id',$id)->first();
      $data['item'] = Item::where('order_id',$id)->get();
      $data['totalItem'] = Item::where('order_id',$id)->count();
      $data['totalAcara'] = Acara::where('order_id',$id)->count();
      // dd($data);
    	return view('order.edit',$data);
    }
    // end edit
    public function update(Request $request,$id){
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

      if($request->has('acaras')){
        foreach ($request["acaras"] as $a => $acara) {
          $new = new Acara;
          $new->fill($acara);
          $new->order_id = $order->id;
          $new->save();
        }
      }

      $item = Item::where('order_id',$order->id)->delete();

      if($request->has('items')){
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
      }

      $data['notification'] = Notification::create([
          "title"=>Auth::user()->name,
          "content"=>Auth::user()->name." telah mengedit pesanan",
          "isRead"=>0,
          ]);

      return redirect()->route('orders.index');
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

      if(isset($request['acaras'])){
        foreach ($request["acaras"] as $a => $acara) {
          $new = new Acara;
          $new->fill($acara);
          $new->order_id = $order->id;
          $new->save();
        }
      }

      if($request->has('items')){
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
      }

        $data['notification'] = Notification::create([
            "title"=>Auth::user()->name,
            "content"=>Auth::user()->name." telah menerima pesanan milik ".$order->nama_pemesan,
            "isRead"=>0,
            ]);

    	return redirect()->route('orders.index');
    }
    public function destroy($id){
        // dd($request);
        $order=Order::find($id);
        $data['notification'] = Notification::create([
            "title"=>Auth::user()->name,
            "content"=>Auth::user()->name." telah mendelete pesanan milik ".$order->nama_pemesan,
            "isRead"=>0,
            ]);
        $order->delete();
        // $data['file']=Storage::delete(storage_path().'/app/'.$request['file']);
        // dd(storage_path()."/app/".$request['file']);

        return response()->json($order);
    }
}
