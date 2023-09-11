<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Services\ServicesCreateRequest;
use App\Http\Requests\Services\ServicesUpdateRequest;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{

    public function index()
    {


        $services = Services::all();

        return view('admin.services.index', compact('services'));
    }

    public function edit($id)
    {
        $service = Services::findOrFail($id);

        return view('admin.services.update', compact('service'));
    }

    // public function update(ServicesUpdateRequest $request, $id)
    // {
    //     $service = Services::findOrFail($id); // Use findOrFail

    //     $data = $request->validated();

    //     $hasElement = $service->service_image;

    //     $randomName = Str::uuid();
    //     $imagePath =  'assets/image/';

    //     if ($request->hasFile('service_image')) {
    //         if (file_exists($imagePath .  $hasElement)) {
    //             unlink($imagePath .  $hasElement);
    //         }
    //         $img = $request->image;
    //         $extension = $img->getClientOriginalExtension();
    //         $lastName = $randomName . "." . $extension;
    //         $lasPath = $imagePath . $randomName . "." . $extension;
    //         Image::make($img)->save($lasPath);
    //     } else {
    //         $lastName =   $hasElement;
    //     }

    //     $data['service_image'] = $lastName;





    //     if ($request->hasFile('service_image')) {
    //         $imagePath = 'images/' . $service->id . '.' . $request->service_image->getClientOriginalExtension();
    //         $image = Image::make($request->service_image);
    //         $image->save(public_path($imagePath));
    //     }

    //     // try {
    //     //     $service->update($data);
    //     //     return redirect()->route('services.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
    //     // } catch (\Exception $exception) {

    //     //     return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
    //     // }


    //     $hasIcon = $service->service_icon;

    //     $randomName = Str::uuid();
    //     $imagePath =  'assets/image/';

    //     if ($request->hasFile('service_icon')) {
    //         if (file_exists($imagePath .  $hasIcon)) {
    //             unlink($imagePath .  $hasIcon);
    //         }
    //         $img = $request->service_icon;
    //         $extension = $img->getClientOriginalExtension();
    //         $lastName = $randomName . "." . $extension;
    //         $lasPath = $imagePath . $randomName . "." . $extension;
    //         Image::make($img)->save($lasPath);
    //     } else {
    //         $lastName =   $hasIcon;
    //     }

    //     $data['service_icon'] = $lastName;





    //     if ($request->hasFile('service_icon')) {
    //         $imagePath = 'images/' . $service->id . '.' . $request->service_icon->getClientOriginalExtension();
    //         $image = Image::make($request->service_icon);
    //         $image->save(public_path($imagePath));
    //     }

    //     try {
    //         $service->update($data);
    //         return redirect()->route('services.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
    //     } catch (\Exception $exception) {

    //         return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
    //     }
    // }
    public function update(ServicesUpdateRequest $request, $id)
    {
        $service = Services::findOrFail($id);
        $data = $request->validated();

        // Service Image
        if ($request->hasFile('service_image')) {
            $randomName = Str::uuid();
            $extension = $request->file('service_image')->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = 'assets/image/' . $lastName;
            Image::make($request->file('service_image'))->save($lasPath);
            $data['service_image'] = $lastName;
        }

        // Service Icon
        if ($request->hasFile('service_icon')) {
            $randomName = Str::uuid();
            $extension = $request->file('service_icon')->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = 'assets/image/' . $lastName;
            Image::make($request->file('service_icon'))->save($lasPath);
            $data['service_icon'] = $lastName;
        }

        try {
            $service->update($data);
            return redirect()->route('services.index')->with(['type' => 'success', 'message' => 'Updated']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }


    // public function store(ServicesCreateRequest $request)
    // {


    //     $data = $request->validated();

    //     try {
    //         if ($request->hasFile('service_image')) {
    //             $img = $request->service_image;
    //             $extension = $img->getClientOriginalExtension();

    //             $randomName = Str::random(10);
    //             $imagePath = 'assets/image/';
    //             $lastName = $randomName . "." . $extension;
    //             $lasPath = $imagePath . $randomName . "." . $extension;

    //             Image::make($img)->save($lasPath);

    //             $data['service_image'] = $lastName;
    //         };
    //         Services::create($data);
    //         return redirect()->route('services.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
    //     } catch (\Exception $exception) {
    //         return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
    //     }

    //     try {
    //         if ($request->hasFile('service_icon')) {
    //             $img = $request->service_icon;
    //             $extension = $img->getClientOriginalExtension();

    //             $randomName = Str::random(10);
    //             $imagePath = 'assets/image/';
    //             $lastName = $randomName . "." . $extension;
    //             $lasPath = $imagePath . $randomName . "." . $extension;

    //             Image::make($img)->save($lasPath);

    //             $data['service_icon'] = $lastName;
    //         };
    //         Services::create($data);
    //         return redirect()->route('services.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
    //     } catch (\Exception $exception) {
    //         return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
    //     }
    // }

    public function store(ServicesCreateRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('service_image')) {
            $randomName = Str::uuid();
            $extension = $request->file('service_image')->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = 'assets/image/' . $lastName;
            Image::make($request->file('service_image'))->save($lasPath);
            $data['service_image'] = $lastName;
        }

        if ($request->hasFile('service_icon')) {
            $randomName = Str::uuid();
            $extension = $request->file('service_icon')->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = 'assets/image/' . $lastName;
            Image::make($request->file('service_icon'))->save($lasPath);
            $data['service_icon'] = $lastName;
        }

        try {
            Services::create($data);
            return redirect()->route('services.index')->with(['type' => 'success', 'message' => 'Added']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }



    public function create()
    {



        return view('admin.services.create');
    }



    public function destroy($id)
    {
        $service = Services::findOrFail($id);


        try {
            if (file_exists('assets/image/' .  $service->service_image)) {
                unlink('assets/image/' .  $service->service_image);
            }

            Storage::delete($service->image); // Delete the associated image file
            $service->delete(); // Use delete method to delete the record
            return redirect()->route('services.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }


        try {
            if (file_exists('assets/image/' .  $service->service_icon)) {
                unlink('assets/image/' .  $service->service_icon);
            }

            Storage::delete($service->service_icon); // Delete the associated image file
            $service->delete(); // Use delete method to delete the record
            return redirect()->route('services.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    


}
