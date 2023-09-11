<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChoseUs\ChoseUsCreateRequest;
use App\Http\Requests\ChoseUs\ChoseUsUpdateRequest;
use App\Models\ChoseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ChoseUsController extends Controller
{
    public function index()
    {

        $choseus = ChoseUs::all();

        return view('admin.choseus.index', compact('choseus'));
    }

    public function edit($id)
    {
        $choseus_img = ChoseUs::where('id', $id)->firstOrFail();

        return view('admin.choseus.update', compact('choseus_img'));
    }

    public function update(ChoseUsUpdateRequest $request, $id)
    {
        $choseus_img = ChoseUs::findOrFail($id); // Use findOrFail

        $data = $request->validated();

        $hasElement = $choseus_img->image;

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
            $imagePath = 'images/' . $choseus_img->id . '.' . $request->image->getClientOriginalExtension();
            $image = Image::make($request->image);
            $image->save(public_path($imagePath));
        }

        try {
            $choseus_img->update($data);
            return redirect()->route('choseus.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {

            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function store(ChoseUsCreateRequest $request)
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
            ChoseUs::create($data);
            return redirect()->route('choseus.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function create()
    {



        return view('admin.choseus.create');
    }

    public function destroy($id)
    {
        $choseus_img = ChoseUs::findOrFail($id);


        try {
            if (file_exists('assets/image/' .  $choseus_img->image)) {
                unlink('assets/image/' .  $choseus_img->image);
            }

            Storage::delete($choseus_img->image); // Delete the associated image file
            $choseus_img->delete(); // Use delete method to delete the record
            return redirect()->route('choseus.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }


}
