@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/projectname.css')}}">
@endsection

@section('content')
<div class="projectname_body">
    <div class="projectname_body_header">
        <div class="body_header_title container">
            <h1>XİDMƏTLƏRİMİZ <img src="{{asset('./assets/image/Vector.png')}}" alt="">{{$portfoliobox->title}}</h1>
            <p>{{$portfoliobox->portfolio_boxes_category}}</p>
        </div>
    </div>
    <div class="projectname_body_content container">
        <h1>OTHER SERVICES</h1>
        <h2>{{$portfoliobox->header}}</h2>
        <img src="{{asset('assets/image/'.$portfoliobox->banner_image)}}" alt="">
        <div class="projectname_body_contents">
            <section class="content_box">
                <h1>Haqqında</h1>
                <p>{{$portfoliobox->desc}}</p>
            </section>
            <section class="content_box">
                <h1>Rollarımız</h1>
                <p>{{$portfoliobox->rows}}</p>
            </section>
        </div>
    </div>
</div>

<div class="projectname_foot_img">
    <img src="{{asset('assets/image/'.$portfoliobox->banner_image)}}" alt="">

</div>

<div class="otherproject container">
    <div class="otherproject_header">Digər layihələr</div>
    <div class="otherproject_body">
        @foreach($portfolioboxes as $portfoliobox)
        <div class="portfolio_box">
            <a href="{{route('projectname',$portfoliobox->id)}}">
                <div class="portfolio_box_img"><img src="{{asset('assets/image/'.$portfoliobox->image)}}" alt=""></div>
                <div class="portfolio_box_name">{{$portfoliobox->portfolio_boxes_category}}</div>
                <div class="portfolio_box_title">{{$portfoliobox->title}}</div>
            </a>
        </div>
        @endforeach

    </div>
</div>


@endsection