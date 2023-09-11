<?php

namespace App\Http\Controllers;

use App\Models\BlogBoxes;
use App\Models\ServicesBoxes;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
      

        return view('index', compact('blogboxes'));
    }

    public function blog(){
        $blogboxes = BlogBoxes::all();
  
        return view('blog', compact('blogboxes'));
    }

}
