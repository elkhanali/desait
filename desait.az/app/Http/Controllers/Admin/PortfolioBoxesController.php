<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioBoxes\PortfolioBoxesCreateRequest;
use App\Http\Requests\PortfolioBoxes\PortfolioBoxesUpdateRequest;
use App\Models\PortfolioBoxes;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PortfolioBoxesController extends Controller
{
    public function index()
    {

        $portfolioboxes = PortfolioBoxes::all();

       

        return view('admin.portfolioboxes.index', compact('portfolioboxes'));
    }


    public function edit($id)
    {
        
        $portfoliobox = PortfolioBoxes::where('id', $id)->firstOrFail();

        $portfoliocategories = PortfolioCategory::all();

        return view('admin.portfolioboxes.update', compact('portfoliobox', 'portfoliocategories'));
    }


    public function update(PortfolioBoxesUpdateRequest $request, $id)
    {
        $portfoliobox = PortfolioBoxes::findOrFail($id); // Use findOrFail

        $data = $request->validated();

        // Service Image
        if ($request->hasFile('image')) {
            $randomName = Str::uuid();
            $extension = $request->file('image')->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = 'assets/image/' . $lastName;
            Image::make($request->file('image'))->save($lasPath);
            $data['image'] = $lastName;
        }

        // Service Icon
        if ($request->hasFile('banner_image')) {
            $randomName = Str::uuid();
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = 'assets/image/' . $lastName;
            Image::make($request->file('banner_image'))->save($lasPath);
            $data['banner_image'] = $lastName;
        }


        try {
            $portfoliobox->update($data);
            return redirect()->route('portfolioboxes.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {

            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function store(PortfolioBoxesCreateRequest $request)
    {


        $data = $request->validated();

        


        if ($request->hasFile('image')) {
            $randomName = Str::uuid();
            $extension = $request->file('image')->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = 'assets/image/' . $lastName;
            Image::make($request->file('image'))->save($lasPath);
            $data['image'] = $lastName;
        }

        if ($request->hasFile('banner_image')) {
            $randomName = Str::uuid();
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = 'assets/image/' . $lastName;
            Image::make($request->file('banner_image'))->save($lasPath);
            $data['banner_image'] = $lastName;
        }

        try {
            PortfolioBoxes::create($data);
            return redirect()->route('portfolioboxes.index')->with(['type' => 'success', 'message' => 'Added']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function create()
    {

        $portfoliocategories = PortfolioCategory::all();

        return view('admin.portfolioboxes.create' , compact('portfoliocategories'));
    }


    public function destroy($id)
    {
        $portfoliobox = PortfolioBoxes::findOrFail($id);


        try {
            if (file_exists('assets/image/' .  $portfoliobox->image)) {
                unlink('assets/image/' .  $portfoliobox->image);
            }

            Storage::delete($portfoliobox->image); // Delete the associated image file
            $portfoliobox->delete(); // Use delete method to delete the record
            return redirect()->route('portfolioboxes.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }

        try {
            if (file_exists('assets/image/' .  $portfoliobox->banner_image)) {
                unlink('assets/image/' .  $portfoliobox->banner_image);
            }

            Storage::delete($portfoliobox->banner_image); // Delete the associated image file
            $portfoliobox->delete(); // Use delete method to delete the record
            return redirect()->route('portfolioboxes.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

}
