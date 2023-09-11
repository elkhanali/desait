<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioBoxes\PortfolioBoxesCreateRequest;
use App\Http\Requests\PortfolioBoxes\PortfolioBoxesUpdateRequest;
use App\Models\PortfolioBoxes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjectNameController extends Controller
{
    public function projectname($id){
        $portfoliobox = PortfolioBoxes::findOrFail($id);

        $portfolioboxes = PortfolioBoxes::all();

        return view('projectname',compact('portfolioboxes','portfoliobox'));
    }

    public function edit($id)
    {
        $portfolioboxes = PortfolioBoxes::where('id', $id)->firstOrFail();

        return view('projectname', compact('portfolioboxes'));
    }


    public function update(PortfolioBoxesUpdateRequest $request, $id)
    {
        $portfolioboxes = PortfolioBoxes::findOrFail($id); // Use findOrFail

        $data = $request->validated();

        $hasElement = $portfolioboxes->banner_image;

        $randomName = Str::uuid();
        $imagePath =  'assets/image/';

        if ($request->hasFile('banner_image')) {
            if (file_exists($imagePath .  $hasElement)) {
                unlink($imagePath .  $hasElement);
            }
            $img = $request->banner_image;
            $extension = $img->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;
            Image::make($img)->save($lasPath);
        } else {
            $lastName =   $hasElement;
        }

        $data['banner_image'] = $lastName;





        if ($request->hasFile('banner_image')) {
            $imagePath = 'images/' . $portfolioboxes->id . '.' . $request->banner_image->getClientOriginalExtension();
            $image = Image::make($request->banner_image);
            $image->save(public_path($imagePath));
        }

        try {
            $portfolioboxes->update($data);
            return redirect()->route('portfolioboxes.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {

            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function store(PortfolioBoxesCreateRequest $request)
    {


        $data = $request->validated();

        try {
            if ($request->hasFile('banner_image')) {
                $img = $request->banner_image;
                $extension = $img->getClientOriginalExtension();

                $randomName = Str::random(10);
                $imagePath = 'assets/image/';
                $lastName = $randomName . "." . $extension;
                $lasPath = $imagePath . $randomName . "." . $extension;

                Image::make($img)->save($lasPath);

                $data['banner_image'] = $lastName;
            };
            PortfolioBoxes::create($data);
            return redirect()->route('portfolioboxes.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function create()
    {



        return view('admin.portfolioboxes.create');
    }

  
}
