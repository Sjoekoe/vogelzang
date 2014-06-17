<?php 

class PricesTableSeeder extends Seeder {
	public function run() {
		DB::table('prices')->truncate();

		Price::create(array('price' => '0 - 500'));
		Price::create(array('price' => '500 - 1.000'));
		Price::create(array('price' => '1.000 - 2.500'));
		Price::create(array('price' => '2.500 - 5.000'));
		Price::create(array('price' => '5.000 - 10.000'));
		Price::create(array('price' => '10.000+'));
	}
}

 ?>