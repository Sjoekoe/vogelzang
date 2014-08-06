<?php

class HorsesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$horses = Horse::paginate(3);
		return View::make('horses.index', compact('horses'))->with('title', 'pony\'s / paarden te koop');
	}

	public function indexAdmin() {
		$horses = Horse::orderBy('id', 'desc')->paginate(7);
		return View::make('admin.horses.index', compact('horses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('horses.create');
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
				'name' 			=> 'required',
				'breed' 		=> 'required',
				'description' 	=> 'required|max:2000'
			)
		);

		if($validator->fails()) {
			return 	Redirect::route('horses.create')
					->withErrors($validator)
					-> withInput(Input::except('images'));
		} else {
			$horse = Horse::create(array(
				'name' => Input::get('name'),
				'breed' => Input::get('breed'),
				'age'	=> Input::get('age'),
				'description' => Input::get('description'),
				'gender_id'	=> Input::get('gender'),
				'price_id'	=> Input::get('price')
			));

			$files = Input::file('images');

			foreach ($files as $file) {
				$rules = array('images'	=> 'required');
				$validator= Validator::make(array('images' => $file), $rules);
				if ($validator->fails()) {
					return Redirect::route('horses.edit', $horse->id)->with('global', 'gelieve nog minstens 1 foto toe te voegen');
				} else {
					$extension = $file->getClientOriginalExtension();
					$path = '/uploads/horses/'.$horse->id;
					$filename = str_random(12);
					$pathToFile = public_path().$path.'/'.$filename.'.'.$extension;

					if(!file_exists(public_path().$path)) {
						File::makeDirectory(public_path().$path);
					}

					// File::makeDirectory('public/'.$path);
					Image::make($file->getrealpath())->resize(null, 870, function($constraints) {
						$constraints->aspectRatio();
					} )->save($pathToFile);
					// $file->move('public/'.$path, $filename.'.'.$extension);

					$photo = Horsepicture::create(array(
						'horse_id' => $horse->id,
						'path' => $path.'/'.$filename.'.'.$extension
					));
				}
					
			}

			

			if ($horse) {
				return Redirect::route('horses.admin.index')->with('global', 'Het paard is aangemaakt en terug te vinden in het overzicht.');
			} else {
				return Redirect::route('horses.create')->with('global', 'Het paard kon niet worden aangemaakt');
			}
		}
		return Redirect::route('horses.create')->with('global', 'Er heeft zich een probleem voortgedaan bi het aanmaken. Gelieve later nog eens te proberen.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$horse = Horse::with('horsepicture')->where('id', '=', $id);
		if($horse->count()) {
			$horse = $horse->first();
			return View::make('horses.show', compact('horse'))->with('title', 'Pony\'s / paarden te koop');
		}

		return Redirect::route('horses.show')->with('global', 'Dit paard bestaat niet');
		
	}

	public function showAdmin($id) {
		$horse = Horse::where('id', '=', $id);
		if ($horse->count()) {
			$horse = $horse->first();
			return View::make('admin.horses.show', compact('horse'));
		}
		return Redirect::route('horses.admin.index')->with('global', 'Dit paard bestaat niet.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$horse = Horse::where('id', '=', $id);
		if ($horse->count()) {
			$horse = $horse->first();
			return View::make('horses.edit', compact('horse'));
		}
		return Redirect::route('horses.admin.index')->with('global', 'Dit paard bestaat niet');
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$horse = Horse::findOrFail($id);
		$validator = Validator::make(Input::all(),
			array(
				'name' 			=> 'required',
				'breed' 		=> 'required',
				'description' 	=> 'required|max:2000'
			)
		);

		if ($validator->fails()) {
			return Redirect::route('horses.edit', $horse->id)->withErrors($validator)->withInput();
		} else {
			$horse->fill(Input::all());

			$files = Input::file('images');

			
			foreach ($files as $file) {
				if (!empty($file)) {
					$extension = $file->getClientOriginalExtension();
					$path = '/uploads/horses/'.$horse->id;
					$filename = str_random(12);
					$pathToFile = public_path().$path.'/'.$filename.'.'.$extension;

					// File::makeDirectory('public/'.$path);
					Image::make($file->getrealpath())->resize(null, 870, function($constraints) {
						$constraints->aspectRatio();
					} )->save($pathToFile);
					// $file->move('public/'.$path, $filename.'.'.$extension);

					$photo = Horsepicture::create(array(
						'horse_id' => $horse->id,
						'path' => $path.'/'.$filename.'.'.$extension
					));
				}
				
			}
						

			if ($horse->save()) {
				return Redirect::route('horses.admin.show', $horse->id)->with('global', 'wijzigingen aan het paard zijn opgeslagen.');
			} else {
				return Redirect::route('horses.edit', $horse->id)->with('global', 'de gegevens van het paard konden niet worden opgeslaan.');
			}
		}
		return Redirect::route('horses.admin.index')->with('global', 'er heeft zich een fout voorgedaan bij het wijzigen. Gelieve later nog eens te proberen.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$horse = Horse::findOrFail($id);
		$files = Horse::find($id)->horsepicture;
		if ($files->count()) {
			foreach ($files as $file) {
				File::delete(public_path().$file->path);
				$file->delete();
			}
			rmdir(public_path().'/uploads/horses/'.$horse->id);
		}
		
		if($horse->delete()) {
			return Redirect::route('horses.admin.index')->with('global', 'Paard is verwijderd');
		}
		return Redirect::route('horses.admin.index')->with('global', 'Het paard kon niet worden verwijderd.');
	}

	public function destroyPicture($id) {
		$photo = Horsepicture::find($id);
		$horse_id = $photo->horse_id;

		if (!empty($photo)) {
			File::delete(public_path().$photo->path);
			if ($photo->delete()) {
				return Redirect::route('horses.edit', $horse_id)->with('global', 'De foto is verwijderd');
			}
			return Redirect::route('horses.edit', $horse_id)->with('global', 'de foto kon niet worden verwijderd');
		}
		return Redirect::route('horses.edit', $horse_id)->with('global', 'Er heeft zich een probleem voorgedaan. Probeer later nog eens');
	}

}