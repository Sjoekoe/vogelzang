<?php 

class HorsepicturesTableSeeder extends Seeder {
	public function run() {
		DB::table('horsepictures')->truncate();

		Horsepicture::create(array(
			'horse_id' 	=> 1,
			'path'		=> 'uploads/horses/1/razRF8Jb9q43.jpg'
		));

		Horsepicture::create(array(
			'horse_id' 	=> 2,
			'path'		=> 'uploads/horses/2/GjsK91Poy4Gy.jpg'
		));

		Horsepicture::create(array(
			'horse_id' 	=> 3,
			'path'		=> 'uploads/horses/3/wGUOt2iQJBBs.jpg'
		));

		Horsepicture::create(array(
			'horse_id'	=> 4,
			'path'		=> 'uploads/horses/4/IYjF1cPe5hB0.jpg'
		));
	}
}

 ?>