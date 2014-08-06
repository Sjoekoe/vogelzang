<?php

class ItemsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Item::orderBy('id', 'desc')->paginate(7);

		return View::make('items.index', compact('items'))->with('title', 'Nieuws');
	}

	public function indexAdmin() {
		$items = Item::orderBy('id', 'desc')->paginate(10);
		return View::make('admin.items.index', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('items.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Auth::check()) {
			$user_id = Auth::user()->id;
		}

		$validator = Validator::make(Input::all(),
			array(
				'title' => 'required|min:3|max:50',
				'message' => 'required|max:2000',
				'image' => 'mimes:jpg,png,jpeg,bmp,JPG'
			)
		);

		if ($validator->fails()) {
			return Redirect::route('items.create')->withErrors($validator)->withInput();
		} else {
			$image = Input::file('image');
			$item = Item::create(array(
				'title' 	=> Input::get('title'),
				'message' 	=> Input::get('message'),
				'user_id'	=> $user_id
			));

			if (!empty($image)) {
				$extension = $image->getClientOriginalExtension();
				$path = '/uploads/items/'.$item->id;
				$filename = str_random(12);
				// Input::file('image')->move('public/'.$path, $filename.'.'.$extension);
				$pathToFile = public_path().$path.'/'.$filename.'.'.$extension;

					File::makeDirectory(public_path().$path);
					Image::make($image->getrealpath())->resize(null, 870, function($constraints) {
						$constraints->aspectRatio();
					} )->save($pathToFile);

				$photo = Itemphoto::create(array(
					'item_id' => $item->id,
					'path' => $path.'/'.$filename.'.'.$extension
				));
			}

			

			if ($item) {
				return Redirect::route('items.admin.index')->with('global', 'Nieuwsbericht is opgeslagen.');
			} else {
				return Redirect::route('items.create')->with('global', 'Het bericht kon niet worden opgeslagen. Probeer later nog eens');
			}
		}

		return Redirect::route('items.create')->with('global', 'Er heeft zich een fout voorgedaan. Probeer later nog eens.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$item = Item::where('id', '=', $id);
		if ($item->count()) {
			$item = $item->first();
			return View::make('items.show', compact('item'))->with('title', $item->title);
		}

		return Redirect::route('items.index')->with('global', 'Dit bericht bestaat niet');
	}

	public function showAdmin($id) {
		$item = Item::where('id', '=', $id);
		if ($item->count()) {
			$item = $item->first();
			return View::make('admin.items.show', compact('item'));
		}

		return Redirect::route('items.admin.index')->with('global', 'Dit bericht bestaat niet');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = Item::where('id', '=', $id);

		if ($item->count()) {
			$item = $item->first();
			return View::make('items.edit', compact('item'));	
		}

		return Redirect::route('items.admin.index')->with('global', 'Dit bericht bestaat niet');
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$item = Item::findOrFail($id);
		$image = Input::file('image');
		$validator = Validator::make(Input::all(),
			array(
				'title' => 'required|min:3|max:50',
				'message' => 'required|max:2000',
				'image' => 'mimes:jpg,png,jpeg,bmp'
			)
		);

		if ($validator->fails()) {
			return Redirect::route('items.edit', $item->id)->withErrors($validator)->withInput();
		} else {
			//  Update the news DB
			$item->fill(Input::all());

			// Delete old picture if there is one
			if (!empty($image)) {
				$saved_picture = Itemphoto::where('item_id', '=', $id)->first();

				
				if ($saved_picture) {
					File::delete(public_path().$saved_picture->path);
					$saved_picture->delete();
					rmdir(public_path().'/uploads/items/'.$item->id);
				}

				// Create a new picture
				$extension = $image->getClientOriginalExtension();
				$path = '/uploads/items/'.$item->id;
				$filename = str_random(12);
				// Input::file('image')->move('public/'.$path, $filename.'.'.$extension);
				$pathToFile = public_path().$path.'/'.$filename.'.'.$extension;

					if(!file_exists(public_path().$path)) {
						File::makeDirectory(public_path().$path);
					}
					// File::makeDirectory('public/'.$path);
					Image::make(Input::file('image')->getrealpath())->resize(null, 870, function($constraints) {
						$constraints->aspectRatio();
					} )->save($pathToFile);

				$photo = Itemphoto::create(array(
					'item_id' => $item->id,
					'path' => $path.'/'.$filename.'.'.$extension
				));
			}

			if ($item->save()) {
				return Redirect::route('items.admin.index')->with('global', 'Het bericht is gewijzigd.');
			} else {
				return Redirect::route('items.edit', $item->id)->with('global', 'Het bericht kon niet worden gewijzigd');
			}
		}

		return Redirect::route('items.edit', $item->id)->with('global', 'Er heeft zich een probleem voorgedaan. Probeer later nog eens');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$item = Item::findOrFail($id);
		$photo = Item::find($id)->itemphoto;

		if (!empty($photo)) {
			File::delete(public_path().$photo->path);
			$photo->delete();
			
			rmdir(public_path().'/uploads/items/'.$item->id);
		}

		if ($item->delete()) {
			return Redirect::route('items.admin.index')->with('global', 'Het bericht is verwijderd.');
		}

		return Redirect::route('items.admin.index')->with('global', 'Er heeft zich een probleem voorgedaan. Probeer later nog eens.');
	}

	public function destroyPhoto($id) {
		$photo = Itemphoto::find($id);
		$item_id = $photo->item_id;

		if(!empty($photo)) {
			File::delete(public_path().$photo->path);
			rmdir(public_path().'/uploads/items/'.$item_id);
			if($photo->delete()) {
				return Redirect::route('items.edit', $item_id)->with('global', 'de foto is verwijderd');
			}
			return Redirect::route('items.edit', $item_id)->with('global', 'de foto kon niet worden verwijderd');
		}

		return Redirect::route('items.edit', $item_id)->with('global', 'er heeft zich een probleem voorgedaan. Probeer later nog eens');
	}

}