<?php



class ContactsTableSeeder extends Seeder {

	public function run(){
		DB::table('contacts')->truncate();

		Contact::create(array(
			'subject' 	=> 'Aankopen paard',
			'full_name'	=> 'Hans Jonckers',
			'email'		=> 'jonckershans@gmail.com',
			'message'	=> 'ik wil een paard kopen bla bla bla'
		));

		Contact::create(array(
			'subject' 	=> 'Stallingen',
			'full_name'	=> 'Dedia Leyn',
			'email'		=> 'test@test.com',
			'message'	=> 'Wat kost een stalling'
		));

		Contact::create(array(
			'subject' 	=> 'Nog een test',
			'full_name' => 'Peter Wauters',
			'email'		=> 'email@email.com',
			'message'	=> 'En we blijven testen doen'
		));
	}

}