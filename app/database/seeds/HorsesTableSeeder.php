<?php 

class HorsesTableSeeder extends Seeder {

	public function run() {
		DB::table('horses')->truncate();

		Horse::create(array(
			'name' 			=> 'Florien',
			'breed' 		=> 'Westfaler',
			'description' 	=> 'Hierkomt nen helen tekst te staan',
			'age' 			=> 17,
			'gender_id' 	=> 3,
			'price_id' 		=> 4
		));
		Horse::create(array(
			'name' 			=> 'Bentley',
			'breed' 		=> 'New Forest Pony',
			'description' 	=> 'Hier komt nen helen tekst te staan',
			'age' 			=> 6,
			'gender_id' 	=> 2,
			'price_id' 		=> 2
		));

		Horse::create(array(
			'name' 			=> 'Pozzo',
			'breed' 		=> 'Appalooza',
			'description' 	=> 'Niets mee aan te vangen',
			'age' 			=> 8,
			'gender_id' 	=> 2,
			'price_id' 		=> 1
		));

		Horse::create(array(
			'name'			=> 'Matulin',
			'breed'			=> 'Werkpaard',
			'description'	=> 'Genen uitleg nodig',
			'age'			=> 18,
			'gender_id'		=> 1,
			'price_id'		=> 6
		));
	}

}

 ?>