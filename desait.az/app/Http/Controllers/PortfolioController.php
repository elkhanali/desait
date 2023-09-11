<?php

namespace App\Http\Controllers;

use App\Models\PortfolioBoxes;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function portfolio(){
        $portfoliocategories = PortfolioCategory::all();

        $portfolioboxes = PortfolioBoxes::all();

        return view('portfolio',compact('portfoliocategories', 'portfolioboxes'));
    }

    public function get_portfolio($id)
    {
        if ($id != 0) {
            $datas = PortfolioBoxes::where('category_id', $id)->with('filter')->get();
        } else {
            $datas = PortfolioBoxes::with('filter')->get(); 
        }

        $jsonData = $datas->toJson();
        return response()->json($jsonData);
    }
}
