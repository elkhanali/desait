<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesCategories\ServicesCategoriesCreateRequest;
use App\Http\Requests\ServicesCategories\ServicesCategoriesUpdateRequest;
use App\Models\Services;
use App\Models\ServicesChilde;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class ServicesCategoriesController extends Controller
{
    public function index()
    {
        $services =Services::all();
      

        $servicescategories = ServicesChilde::all();

        return view('admin.servicescategories.index', compact('servicescategories','services'));
    }

    public function edit($id)
    {

        $servicescategory = ServicesChilde::where('id', $id)->firstOrFail();

        $services = Services::all();

        return view('admin.servicescategories.update', compact('servicescategory', 'services'));
    }

    public function update(ServicesCategoriesUpdateRequest $request, $id)
    {
        $services = ServicesChilde::findOrFail($id); // Use findOrFail

        $data = $request->validated();

// dd($data);0



      

        try {
            $services->update($data);
            return redirect()->route('servicescategories.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {

            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }


    public function store(ServicesCategoriesCreateRequest $request)
    {


        $data = $request->validated();

        // dd($data);

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
            ServicesChilde::create($data);
            return redirect()->route('servicescategories.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function create()
    {

        $services = Services::all();

        return view('admin.servicescategories.create', compact('services'));
    }


    public function destroy($id)
    {
        $services = ServicesChilde::findOrFail($id);


        try {
        

            $services->delete(); // Use delete method to delete the record
            return redirect()->route('servicescategories.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }


}
