@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/blog.css')}}">
@endsection

@section('content')

<div class="blog_body">
    <div class="blog_body_header ">
        <div class="body_header_title container">
            <h1>BLOQ</h1>
            <p>Thoughts. Ideas. Opinion. News.</p>
        </div>
    </div>
    <div class="blog_body_content container">
        <div class="blog_boxes  ">
            @foreach($blogboxes as $blogbox)
            <div class="blog_box">
                <a href="{{route('blogpost')}}">
                    <div class="blog_box_img">
                        <img src="{{asset('assets/image/'.$blogbox->image)}}" alt="">
                    </div>
                    <div class="blog_box_content">
                        <div class="blog_box_info">{{$blogbox->blog_boxes_category}} . {{$blogbox->created_at}}</div>
                        <div class="blog_box_title">{{$blogbox->desc}}</div>
                    </div>

                </a>
            </div>
            @endforeach



        </div>
    </div>

    @endsection