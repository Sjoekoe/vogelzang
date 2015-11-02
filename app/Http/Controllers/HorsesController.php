<?php
namespace Vogelzang\Http\Controllers;

use File;
use Image;
use Vogelzang\Http\Requests\HorseRequest;
use Vogelzang\Models\Horse;
use Vogelzang\Models\Horsepicture;

class HorsesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $horses = Horse::paginate(3);

        return view('horses.index', compact('horses'))->with('title', 'Pony\'s / paarden te koop');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function indexAdmin()
    {
        $horses = Horse::orderBy('id', 'desc')->paginate(20);

        return view('admin.horses.index', compact('horses'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('horses.create');
    }

    /**
     * @param \Vogelzang\Http\Requests\HorseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HorseRequest $request)
    {
        $horse = Horse::create([
            'name' => $request->get('name'),
            'breed' => $request->get('breed'),
            'age' => $request->get('age'),
            'description' => $request->get('description'),
            'gender_id' => $request->get('gender'),
            'price_id' => $request->get('price'),
        ]);

        foreach ($request->file('images') as $file) {
            $extension = $file->getClientOriginalExtension();
            $path = '/uploads/horses/' . $horse->id;
            $filename = str_random(12);
            $shortPath = $path . '/' . $filename . '.' . $extension;
            $pathToFile = public_path() . $shortPath;

            if (! file_exists(public_path() . $path)) {
                File::makeDirectory(public_path() . $path);
            }

            Image::make($file->getRealpath())->resize(null, 870, function ($constraints) {
                $constraints->aspectRatio();
            })->save($pathToFile);

            Horsepicture::create([
                'horse_id' => $horse->id,
                'path' => $shortPath,
            ]);
        }

        return redirect()->route('horses.admin.index')->with('global', 'Het paard is aangemaakt');
    }

    /**
     * @param \Vogelzang\Models\Horse $horse
     * @return \Illuminate\View\View
     */
    public function show(Horse $horse)
    {
        return view('horses.show', compact('horse'))->with('title', 'Pony\'s / paarden te koop');
    }

    /**
     * @param \Vogelzang\Models\Horse $horse
     * @return \Illuminate\View\View
     */
    public function showAdmin(Horse $horse)
    {
        return view('admin.horses.show', compact('horse'));
    }

    /**
     * @param \Vogelzang\Models\Horse $horse
     * @return \Illuminate\View\View
     */
    public function edit(Horse $horse)
    {
        return view('horses.edit', compact('horse'));
    }

    /**
     * @param \Vogelzang\Http\Requests\HorseRequest $request
     * @param \Vogelzang\Models\Horse $horse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HorseRequest $request, Horse $horse)
    {
        $horse->fill($request->all());

        foreach ($request->file('images') as $file) {
            $extension = $file->getClientOriginalExtension();
            $path = '/uploads/horses/' . $horse->id;
            $filename = str_random(12);
            $shortPath = $path . '/' . $filename . '.' . $extension;
            $pathToFile = public_path() . $shortPath;

            if (! file_exists(public_path() . $path)) {
                File::makeDirectory(public_path() . $path);
            }

            Image::make($file->getRealpath())->resize(null, 870, function ($constraints) {
                $constraints->aspectRatio();
            })->save($pathToFile);

            Horsepicture::create([
                'horse_id' => $horse->id,
                'path' => $shortPath,
            ]);
        }

        return redirect()->route('horses.admin.show', $horse->id)->with('global', 'Het paard is gewijzigd');
    }

    /**
     * @param \Vogelzang\Models\Horse $horse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Horse $horse)
    {
        $files = $horse->horsepicture;

        if (count($files)) {
            foreach ($files as $file) {
                File::delete(public_path() . $file->path);
                $file->delete();
            }

            rmdir(public_path() . '/uploads/horses/' . $horse->id);
        }

        $horse->delete();

        return redirect()->route('horses.admin.index')->with('global', 'Het paard is verwijderd');
    }

    /**
     * @param \Vogelzang\Models\Horsepicture $photo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyPicture(Horsepicture $photo)
    {
        $horse_id = $photo->horse_id;

        File::delete(public_path() . $photo->path);
        $photo->delete();

        return redirect()->route('horses.edit', $horse_id)->with('global', 'De foto is verwijderd');
    }
}
