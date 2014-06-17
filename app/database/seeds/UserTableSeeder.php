<?php 

class UserTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->truncate();

		User::create(array(
			'email' => 'jonckershans@gmail.com',
			'username' => 'Admin',
			'first_name' => 'Hans',
			'last_name' => 'Jonckers',
			'password' => Hash::make('password'),
			'active' => 1,
			'level_id' => 3
		));
	}
}

 ?>