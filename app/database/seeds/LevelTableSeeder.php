<?php 

class LevelTableSeeder extends Seeder {
	public function run() {
		DB::table('levels')->truncate();

		Level::create(array('level' => 'Lid'));
		Level::create(array('level' => 'Moderator'));
		Level::create(array('level' => 'Administrator'));
	}
}

 ?>