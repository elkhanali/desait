<?php

namespace App\Http\Controllers;

use App\Http\Requests\Services\ServicesCreateRequest;
use App\Http\Requests\Services\ServicesUpdateRequest;
use App\Models\Services;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index($id){


        $service = Services::findOrFail($id);

        return view('service', compact('service'));
    }

    public function edit($id)
    {
        $service = Services::where('id', $id)->firstOrFail();

        return view('service', compact('service'));
    }


    public function update(ServicesUpdateRequest $request, $id)
    {
        $service = Services::findOrFail($id); // Use findOrFail

        $data = $request->validated();

        $hasElement = $service->service_image;

        $randomName = Str::uuid();
        $imagePath =  'assets/image/';

        if ($request->hasFile('service_image')) {
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

        $data['service_image'] = $lastName;





        if ($request->hasFile('service_image')) {
            $imagePath = 'images/' . $service->id . '.' . $request->image->getClientOriginalExtension();
            $image = Image::make($request->image);
            $image->save(public_path($imagePath));
        }

        try {
            $service->update($data);
            return redirect()->route('service.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {

            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }


    public function store(ServicesCreateRequest $request)
    {


        $data = $request->validated();

        try {
            if ($request->hasFile('service_image')) {
                $img = $request->image;
                $extension = $img->getClientOriginalExtension();

                $randomName = Str::random(10);
                $imagePath = 'assets/image/';
                $lastName = $randomName . "." . $extension;
                $lasPath = $imagePath . $randomName . "." . $extension;

                Image::make($img)->save($lasPath);

                $data['service_image'] = $lastName;
            };
            Services::create($data);
            return redirect()->route('service.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }



    public function create()
    {



        return view('admin.blogboxes.create');
    }


}
