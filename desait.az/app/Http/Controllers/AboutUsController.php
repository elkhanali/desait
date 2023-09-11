<?php

namespace App\Http\Controllers;

use App\Models\Employers;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    public function index()
    {
        return view('index');
    }
    public function aboutus()
    {
        $employers = Employers::all();


        return view('aboutus',compact('employers'));
    }
}
