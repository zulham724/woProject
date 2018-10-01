<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		[
    			'id'=>1,
    			'order_id'=>1,
    			'item_list_id'=>1,
    			'price'=>2000,
    			'person'=>'siti',
    			'date'=>'2018-10-10',
    			'description'=>'ulala'
    		]
    	];
        Item::insert($data);
    }
}
