<?php

use Illuminate\Database\Seeder;
use App\ItemList;

class ItemlistsTableSeeder extends Seeder
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
    			'name'=>'Dekorasi'
    		],
    		[
                'id'=>2,
    			'name'=>'Rias'
    		]
    	];
        ItemList::insert($data);
    }
}
