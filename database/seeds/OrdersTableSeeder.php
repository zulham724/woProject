<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
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
    			'user_id'=>1,
    			'nama_pemesan'=>'zulham',
    			'email_pemesan'=>'zulham@gmail.com',
    			'alamat_pemesan'=>'denpasar',
    			'kota_pemesan'=>'denpasar',
    			'cp_pemesan'=>'09812398123',
    			'pelaksanaan_acara'=>'asd'
    		]
    	];
        Order::insert($data);
    }
}
