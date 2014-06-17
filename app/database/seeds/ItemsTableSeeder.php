<?php

class ItemsTableSeeder extends Seeder {

	public function run() {
		DB::table('items')->truncate();

		Item::create(array(
			'title' 	=> 'The first title',
			'message' 	=> 'This is the body of the item',
			'user_id'	=> 1
		));

		Item::create(array(
			'title'		=> 'The second Title',
			'message'	=> 'Some more text',
			'user_id'	=> 1
		));
	}

}