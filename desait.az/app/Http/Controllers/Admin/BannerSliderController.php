<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerSlider\BannerSliderCreateRequest;
use App\Http\Requests\BannerSlider\BannerSliderUpdateRequest;
use App\Models\BannerSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class BannerSliderController extends Controller
{
    public function index()
    {
        $bannerslider = BannerSlider::all();
        return view('admin.bannerslider.index', compact('bannerslider'));
    }

    public function edit($id)
    {
        $slider = BannerSlider::findOrFail($id); // Use findOrFail
        return view('admin.bannerslider.update', compact('slider'));
    }

    public function update(BannerSliderUpdateRequest $request, $id)
    {
        $slider = BannerSlider::findOrFail($id); // Use findOrFail

        $data = $request->validated();

        $hasElement = $slider->image;

        $randomName = Str::random(10);
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
            $imagePath = 'images/' . $slider->id . '.' . $request->image->getClientOriginalExtension();
            $image = Image::make($request->image);
            $image->save(public_path($imagePath));
        }

        try {
            $slider->update($data); 
            return redirect()->route('bannerslider.index')->with(['type' => 'success', 'message' => 'Yeniləndi']);
        } catch (\Exception $exception) {
            
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }
 
   
    public function store(BannerSliderCreateRequest $request)
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
               
            } ;
            BannerSlider::create($data);
            return redirect()->route('bannerslider.index')->with(['type' => 'success', 'message' => 'Əlavə edildi']);

        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }

    public function create()
    {
        return view('admin.bannerslider.create');
    }

    public function destroy($id)
    {   
        $slider = BannerSlider::findOrFail($id);

       
        try {
            if (file_exists('assets/image/' .  $slider->image)) {
                unlink('assets/image/' .  $slider->image);
            }
    
            Storage::delete($slider->image); // Delete the associated image file
            $slider->delete(); // Use delete method to delete the record
            return redirect()->route('bannerslider.index')->with(['type' => 'success', 'message' => 'Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }
}


// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\BannerSlider\BannerSliderCreateRequest;
// use App\Http\Requests\BannerSlider\BannerSliderUpdateRequest;
// use App\Models\BannerSlider;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Admin\Image; 

// class BannerSliderController extends Controller
// {
//     public function index(){

//         $bannerslider   = BannerSlider::all();

//         return view('admin.bannerslider.index',compact('bannerslider'));
//     }


//     public function edit($id){
//         $slider = BannerSlider::where('id',$id)->firstOrFail();
 
//        return view('admin.bannerslider.update',compact('slider'));
//  }

//  public function update(BannerSliderUpdateRequest $request, $id){
   
//     $data=$request->validated();
//     $data['status']=(bool)$request->status;

//     $slider = BannerSlider::where('id',$id)->firstOrFail();




//     $data = ['status','slug','name','desc'];




 
//     $status=(bool)$request->status;
//     $name=$request->title;
//     $desc=$request->desc;
//     $image=$request->image;
    
//     $slider->title = $name;
//     $slider->status = $status;
//     $slider->desc = $desc; 
//     $slider->image = $image; 


   
     
    


//     try{
//         $slider->save($data);
//         return redirect()->route('bannerslider.index')->with(['type'=>'success','message'=>'Əlavə edildi']);

//     }catch(\Exception $exception){
//         return redirect()->back()->with(['type'=>'danger','message'=>$exception->getMessage()]);
//     };

// }


// public function store(BannerSliderCreateRequest $request){

//     $data=$request->validated();
//     $data['status']=(bool)$request->status;


//     try{
//         BannerSlider::create($data);
//         return redirect()->route('portfoliocategories.index')->with(['type'=>'success','message'=>'Əlavə edildi']);

//     }catch(\Exception $exception){
//         return redirect()->back()->with(['type'=>'danger','message'=>$exception->getMessage()]);
//     };

// }


// public function create(){

//     return view('admin.bannerslider.create');
    
// }

// public function destroy($id) {
//         $slider = BannerSlider::findOrFail($id);
   
//     try {
        
//         $slider->delete($id);

//         return redirect()->route('portfoliocategories.index.destroy')->with(['type' => 'success', 'message' => 'Silindi']);

//     } catch (\Exception $exception) {
//         return redirect()->back()->with(['type' => 'danger', 'message' =>'Silindi']);
//     }
// }
 
// } 
