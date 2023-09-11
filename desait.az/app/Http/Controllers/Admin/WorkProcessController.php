<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkProcess\WorkProcessCreateRequest;
use App\Http\Requests\WorkProcess\WorkProcessUpdateRequest;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class WorkProcessController extends Controller
{
    public function index()
    {

        $workprocess = WorkProcess::all();

        return view('admin.workprocess.index', compact('workprocess'));
    }

    public function edit($id)
    {
        $process = WorkProcess::where('id', $id)->firstOrFail();

        return view('admin.workprocess.update', compact('process'));
    }

    public function update(WorkProcessUpdateRequest $request, $id)
    {
        $process = WorkProcess::findOrFail($id); // Use findOrFail

        $data = $request->validated();

        $hasElement = $process->proccess_icon;

        $randomName = Str::uuid();
        $imagePath =  'assets/image/';

        if ($request->hasFile('proccess_icon')) {
            if (file_exists($imagePath .  $hasElement)) {
                unlink($imagePath .  $hasElement);
            }
            $img = $request->proccess_icon;
            $extension = $img->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;
            Image::make($img)->save($lasPath);
        } else {
            $lastName =   $hasElement;
        }

        $data['proccess_icon'] = $lastName;





        if ($request->hasFile('proccess_icon')) {
            $imagePath = 'images/' . $process->id . '.' . $request->proccess_icon->getClientOriginalExtension();
            $image = Image::make($request->proccess_icon);
            $image->save(public_path($imagePath));
        }

        try {
            $process->update($data);
            return redirect()->route('workprocess.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {

            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }



    public function store(WorkProcessCreateRequest $request)
    {

        $data = $request->validated();


        try {
            if ($request->hasFile('proccess_icon')) {
                $img = $request->proccess_icon;
                $extension = $img->getClientOriginalExtension();

                $randomName = Str::random(10);
                $imagePath = 'assets/image/';
                $lastName = $randomName . "." . $extension;
                $lasPath = $imagePath . $randomName . "." . $extension;

                Image::make($img)->save($lasPath);

                $data['proccess_icon'] = $lastName;
            };
            WorkProcess::create($data);
            return redirect()->route('workprocess.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }


    public function create()
    {
        return view('admin.workprocess.create');
    }


    public function destroy($id)
    {
        $process = WorkProcess::findOrFail($id);


        try {
            if (file_exists('assets/image/' .  $process->proccess_icon)) {
                unlink('assets/image/' .  $process->proccess_icon);
            }

            Storage::delete($process->proccess_icon); // Delete the associated image file
            $process->delete(); // Use delete method to delete the record
            return redirect()->route('workprocess.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }
}
