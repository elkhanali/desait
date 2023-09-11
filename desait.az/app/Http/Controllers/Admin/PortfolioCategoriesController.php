<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioCategory\PortfolioCategoryUpdateRequest;
use App\Http\Requests\PortfolioCategory\PortfolioCategoryCreateRequest;
use App\Models\Category;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoriesController extends Controller
{
    public function index(){

        $portfoliocategories = PortfolioCategory::all();

        return view('admin.portfoliocategories.index',compact('portfoliocategories'));
    }



    public function edit($id){
       $portfoliocategory = PortfolioCategory::where('id',$id)->firstOrFail();

      return view('admin.portfoliocategories.update',compact('portfoliocategory'));
}




public function update(PortfolioCategoryUpdateRequest $request, $id){
   
    $data=$request->validated();
    $data['status']=(bool)$request->status;
    // dd($data);


    $data = ['status','slug','name'];



    $portfoliocategory = PortfolioCategory::where('id',$id)->firstOrFail();

 
    $status=(bool)$request->status;
    $name=$request->portfolios_categories_name;
    $slug=$request->slug;
    
    $portfoliocategory->portfolios_categories_name = $name;
    $portfoliocategory->status = $status;
    $portfoliocategory->slug = $slug;


    try{
        $portfoliocategory->save($data);
        return redirect()->route('portfoliocategories.index')->with(['type'=>'success','message'=>'Əlavə edildi']);

    }catch(\Exception $exception){
        return redirect()->back()->with(['type'=>'danger','message'=>$exception->getMessage()]);
    };

}


   
    public function store(PortfolioCategoryCreateRequest $request){

        $data=$request->validated();
        $data['status']=(bool)$request->status;
    
    
        try{
            PortfolioCategory::create($data);
            return redirect()->route('portfoliocategories.index')->with(['type'=>'success','message'=>'Əlavə edildi']);
    
        }catch(\Exception $exception){
            return redirect()->back()->with(['type'=>'danger','message'=>$exception->getMessage()]);
        };
    
    }



    public function create(){

        return view('admin.portfoliocategories.create');
        
    }

    public function destroy($id) {
            $portfoliocategory = PortfolioCategory::findOrFail($id);
       
        try {
            
            $portfoliocategory->delete($id);
    
            return redirect()->route('portfoliocategories.index.destroy')->with(['type' => 'success', 'message' => 'Silindi']);
    
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' =>'Silindi']);
        }
    }
   
    

}


// public function destroy($id)
    // {
    //     try {
    //         $portfoliocategory = PortfolioCategory::findOrFail($id);
    //         $portfoliocategory->delete();
    
    //         return redirect()->route('portfoliocategories.index')->with(['type' => 'success', 'message' => 'Deleted successfully']);
    //     } catch (\Exception $exception) {
    //         return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
    //     }
    // }