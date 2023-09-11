<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerSlider;
use App\Models\ChoseUs;
use App\Models\Employers;
use App\Models\PortfolioBoxes;
use App\Models\PortfolioCategory;
use App\Models\WorkProcess;
use App\Models\ServicesBoxes;

class HomeController extends Controller
{
    public function index()
    {
        $bannerslider = BannerSlider::all();

        $workprocess = WorkProcess::all();

        $servicesboxes = ServicesBoxes::all();

        $portfolioboxes = PortfolioBoxes::all();

        $employers = Employers::all();

        $choseus = ChoseUs::all();

        // $portfoliocategories = PortfolioCategory::all();

         $portfoliocategories = PortfolioCategory::where('status','!=',0)->get();

        
        return view('index', compact('bannerslider', 'workprocess','servicesboxes', 'portfolioboxes', 'employers', 'choseus', 'portfoliocategories'));
    }

    public function about()
    {
        return view('about');
    }
}
