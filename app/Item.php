<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = "items";
    protected $guarded = ["id"];
    public function orders(){
    	return $this->belongsTo('App\Order');
    }
    public function item_list(){
    	return $this->belongsTo('App\ItemList');
    }

    public function order(){
    	return $this->belongsTo('App\Order');
    }
}
