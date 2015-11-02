<?php
namespace Vogelzang\Http\Controllers;

use File;
use Image;
use Vogelzang\Http\Requests\StoreItemsRequest;
use Vogelzang\Models\Item;
use Vogelzang\Models\Itemphoto;

class ItemsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->paginate(7);

        return view('items.index', compact('items'))->with('title', 'Nieuws');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function indexAdmin()
    {
        $items = Item::orderBy('id', 'desc')->paginate(10);

        return view('admin.items.index', compact('items'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * @param \Vogelzang\Http\Requests\StoreItemsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreItemsRequest $request)
    {
        $item = Item::create([
            'title' => $request->get('title'),
            'message' => $request->get('message'),
            'user_id' => auth()->user()->id,
        ]);

        foreach($request->file('images') as $file) {
            $extension = $file->getClientOriginalExtension();
            $path = '/uploads/items/' . $item->id;
            $filename = str_random(12);
            $shortPath = $path . '/' . $filename . '.' . $extension;
            $pathToFile = public_path() . $shortPath;

            if (! file_exists(public_path() . $path)) {
                File::makeDirectory(public_path() . $path);
            }

            Image::make($file->getRealPath())->resize(null, 870, function ($constraints) {
                $constraints->aspectRatio();
            })->save($pathToFile);

            Itemphoto::create([
                'item_id' => $item->id,
                'path' => $shortPath,
            ]);
        }

        return redirect()->route('items.admin.index')->with('global', 'Nieuwsbericht is opgeslagen');
    }

    /**
     * @param \Vogelzang\Models\Item $item
     * @return \Illuminate\View\View
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'))->with('title', $item->title);
    }

    /**
     * @param \Vogelzang\Models\Item $item
     * @return \Illuminate\View\View
     */
    public function showAdmin(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * @param \Vogelzang\Models\Item $item
     * @return \Illuminate\View\View
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * @param \Vogelzang\Http\Requests\StoreItemsRequest $request
     * @param \Vogelzang\Models\Item $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreItemsRequest $request, Item $item)
    {
        $item->fill($request->all());

        foreach ($request->file('images') as $file) {
            $extension = $file->getClientOriginalExtension();
            $path = '/uploads/items/' . $item->id;
            $filename = str_random(12);
            $shortPath = $path . '/' . $filename . '.' . $extension;
            $pathToFile = public_path() . $shortPath;

            if (! file_exists(public_path() . $path)) {
                File::makeDirectory(public_path() . $path);
            }

            Image::make($file->getRealPath())->resize(null, 870, function ($constraints) {
                $constraints->aspectRatio();
            })->save($pathToFile);

            Itemphoto::create([
                'item_id' => $item->id,
                'path' => $shortPath,
            ]);
        }

        return redirect()->route('items.admin.index')->with('global', 'Het bericht is gewijzigd');
    }

    /**
     * @param \Vogelzang\Models\Item $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Item $item)
    {
        $photos = $item->itemphoto;

        if ($photos->count()) {
            foreach($photos as $photo) {
                File::delete(public_path() . $photo->path);
                $photo->delete();
            }

            rmdir(public_path() . '/uploads/items/' . $item->id);
        }

        $item->delete();

        return redirect()->route('items.admin.index')->with('global', 'Het bericht is verwijderd.');
    }

    /**
     * @param \Vogelzang\Models\Itemphoto $photo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePhoto(Itemphoto $photo)
    {
        $item_id = $photo->item_id;

        File::delete(public_path() . $photo->path);
        $photo->delete();

        return redirect()->route('items.edit', $item_id)->with('global', 'De foto is verwijderd');
    }
}
