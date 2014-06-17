<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contacts = Contact::orderBy('created_at', 'desc')->paginate(7);
		return View::make('contacts.index', compact('contacts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contacts.create')->with('title', 'Contacteer ons');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), 
			array(
				'full_name'	=> 'required',
				'subject' 	=> 'required|max:60|min:3',
				'email'		=> 'required|email',
				'message'	=> 'required|max:2000'
			)
		);

		if ($validator->fails()) {
			return Redirect::route('contacts.create')->withErrors($validator)->withInput();
		} else {
			$subject 		= Input::get('subject');
			$email 			= Input::get('email');
			$message 		= Input::get('message');
			$name			= Input::get('full_name');

			$contact = Contact::create(array(
				'subject' 	=> $subject,
				'full_name'	=> $name,
				'email'		=> $email,
				'message'	=> $message
			));

			if ($contact) {
				Mail::send('emails.contact', array(
					'link'		=> URL::route('contacts.show', $contact->id),
					'subject' 	=> $subject,
					'email'		=> $email
				), function($message) use ($contact) {
					$message->to('jonckershans@gmail.com', 'Admin')->subject('U hebt een nieuw bericht vanop de site.');
				});

				return Redirect::route('contacts.create')->with('global', 'uw bericht is verzonden. We nemen zo spoedig mogelijk contact op met u');
			} else {
				return Redirect::route('contacts.create')->with('global', 'Uw berich kon niet worden verzonden.');
			}
		}

		return Redirect::route('contacts.create')->with('global', 'Er heeft zich een probleem voorgedaan. Probeer later nog eens.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contact = Contact::where('id', '=', $id);
		if ($contact->count()) {
			$contact = $contact->first();
			$contact->read = 1;
			$contact->save();
			return View::make('contacts.show', compact('contact'));
		}
		return Redirect::route('contacts.index')->with('global', 'Dit bericht bestaat niet');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$contact = Contact::where('id', '=', $id);
		if($contact->count()) {
			$contact = $contact->first();
			$contact->delete();
			return Redirect::route('contacts.index')->with('global', 'Bericht verwijderd');
		}
		return Redirect::route('contacts.index')->with('global', 'Bericht bestaat niet, of is reeds verwijderd');
	}

}