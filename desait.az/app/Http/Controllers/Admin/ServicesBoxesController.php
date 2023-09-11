<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesBoxes\ServicesBoxesCreateRequest;
use App\Http\Requests\ServicesBoxes\ServicesBoxesUpdateRequest;
use App\Models\ServicesBoxes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ServicesBoxesController extends Controller
{
    public function index()
    {

        $servicesboxes = ServicesBoxes::all();

        return view('admin.servicesboxes.index', compact('servicesboxes'));
    }

    public function edit($id)
    {
        $servicesbox = ServicesBoxes::where('id', $id)->firstOrFail();

        return view('admin.servicesboxes.update', compact('servicesbox'));
    }


    public function update(ServicesBoxesUpdateRequest $request, $id)
    {
        $servicesbox = ServicesBoxes::findOrFail($id); // Use findOrFail

        $data = $request->validated();

        $hasElement = $servicesbox->image;

        $randomName = Str::uuid();
        $imagePath =  'assets/image/';

        if ($request->hasFile('image')) {
            if (file_exists($imagePath .  $hasElement)) {
                unlink($imagePath .  $hasElement);
            }
            $img = $request->image;
            $extension = $img->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;
            Image::make($img)->save($lasPath);
        } else {
            $lastName =   $hasElement;
        }

        $data['image'] = $lastName;





        if ($request->hasFile('image')) {
            $imagePath = 'images/' . $servicesbox->id . '.' . $request->image->getClientOriginalExtension();
            $image = Image::make($request->image);
            $image->save(public_path($imagePath));
        }

        try {
            $servicesbox->update($data);
            return redirect()->route('servicesboxes.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {

            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }



    public function store(ServicesBoxesCreateRequest $request)
    {

        $data = $request->validated();

        try {
            if ($request->hasFile('image')) {
                $img = $request->image;
                $extension = $img->getClientOriginalExtension();

                $randomName = Str::random(10);
                $imagePath = 'assets/image/';
                $lastName = $randomName . "." . $extension;
                $lasPath = $imagePath . $randomName . "." . $extension;

                Image::make($img)->save($lasPath);

                $data['image'] = $lastName;
            };
            ServicesBoxes::create($data);
            return redirect()->route('servicesboxes.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }



    public function create()
    {
        return view('admin.servicesboxes.create');
    }

    public function destroy($id)
    {
        $servicesbox = ServicesBoxes::findOrFail($id);


        try {
            if (file_exists('assets/image/' .  $servicesbox->image)) {
                unlink('assets/image/' .  $servicesbox->image);
            }

            Storage::delete($servicesbox->image); // Delete the associated image file
            $servicesbox->delete(); // Use delete method to delete the record
            return redirect()->route('servicesboxes.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }
}
