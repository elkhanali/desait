<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogBoxes\BlogBoxesCreateRequest;
use App\Http\Requests\BlogBoxes\BlogBoxesUpdateRequest;
use App\Models\BlogBoxes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogBoxesController extends Controller
{
    public function index()
    {

        $blogboxes = BlogBoxes::all();
    
        return view('admin.blogboxes.index', compact('blogboxes'));
    }

    public function edit($id)
    {
        $blogbox = BlogBoxes::where('id', $id)->firstOrFail();

        return view('admin.blogboxes.update', compact('blogbox'));
    }

    public function update(BlogBoxesUpdateRequest $request, $id)
    {
        $blogbox = BlogBoxes::findOrFail($id); // Use findOrFail

        $data = $request->validated();

        $hasElement = $blogbox->image;

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
            $imagePath = 'images/' . $blogbox->id . '.' . $request->image->getClientOriginalExtension();
            $image = Image::make($request->image);
            $image->save(public_path($imagePath));
        }

        try {
            $blogbox->update($data);
            return redirect()->route('blogboxes.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {

            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function store(BlogBoxesCreateRequest $request)
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
            BlogBoxes::create($data);
            return redirect()->route('blogboxes.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function create()
    {


        
        return view('admin.blogboxes.create');
    }

    public function destroy($id)
    {
        $blogbox = BlogBoxes::findOrFail($id);


        try {
            if (file_exists('assets/image/' .  $blogbox->image)) {
                unlink('assets/image/' .  $blogbox->image);
            }

            Storage::delete($blogbox->image); // Delete the associated image file
            $blogbox->delete(); // Use delete method to delete the record
            return redirect()->route('blogboxes.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }


}
