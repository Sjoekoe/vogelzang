<?php 

class GenderTableSeeder extends Seeder {
	public function run() {
		DB::table('genders')->truncate();

		Gender::create(array('gender' => 'Hengst'));
		Gender::create(array('gender' => 'Ruin'));
		Gender::create(array('gender' => 'Merrie'));
	}
}

 ?>