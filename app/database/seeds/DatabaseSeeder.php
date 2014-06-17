<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('LevelTableSeeder');
		$this->call('HorsesTableSeeder');
		$this->call('GenderTableSeeder');
		$this->call('PricesTableSeeder');
		$this->call('ContactsTableSeeder');
		$this->call('HorsepicturesTableSeeder');
		$this->call('ItemsTableSeeder');
	}

}
