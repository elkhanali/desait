<?php

namespace App\Http\Controllers;

use App\Models\BlogBoxes;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function blogpost(){

        $blogboxes = BlogBoxes::all();

        return view('blogpost',compact('blogboxes'));
    }
}
