<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employers\EmployersCreateRequest;
use App\Http\Requests\Employers\EmployersUpdateRequest;
use App\Models\Employers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EmployersController extends Controller
{
    public function index()
    {

        $employers = Employers::all();

        return view('admin.employers.index', compact('employers'));
    }

    public function edit($id)
    {
        $employer = Employers::where('id', $id)->firstOrFail();

        return view('admin.employers.update', compact('employer'));
    }

    public function update(EmployersUpdateRequest $request, $id)
    {
        $employer = Employers::findOrFail($id); // Use findOrFail

        $data = $request->validated();

        $hasElement = $employer->image;

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
            $imagePath = 'images/' . $employer->id . '.' . $request->image->getClientOriginalExtension();
            $image = Image::make($request->image);
            $image->save(public_path($imagePath));
        }

        try {
            $employer->update($data);
            return redirect()->route('employers.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {

            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function store(EmployersCreateRequest $request)
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
            Employers::create($data);
            return redirect()->route('employers.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function create()
    {



        return view('admin.employers.create');
    }

    public function destroy($id)
    {
        $employer = Employers::findOrFail($id);


        try {
            if (file_exists('assets/image/' .  $employer->image)) {
                unlink('assets/image/' .  $employer->image);
            }

            Storage::delete($employer->image); // Delete the associated image file
            $employer->delete(); // Use delete method to delete the record
            return redirect()->route('employers.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }
}
