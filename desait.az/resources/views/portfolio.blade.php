@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/portfolio.css')}}">
@endsection
@section('content')
<div class="portfolio_body">
    <div class="portfolio_body_header ">
        <div class="body_header_title container">
            <h1>PORTFOLIO</h1>
            <p>Our Works</p>
        </div>
    </div>
    <div class="portfolio_body_content container">
        <div class="portfolio_menu">
            <ul>
                <li><a data-id="0" style="cursor:pointer;">Hamisi</a></li>
                @foreach($portfoliocategories as $portfoliocategory)
                <li style="cursor:pointer;"><a data-id="{{$portfoliocategory->id}}">{{$portfoliocategory->portfolios_categories_name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="portfolio_boxes">
            @foreach($portfolioboxes as $portfoliobox)
            <div class="portfolio_box">
                <a href="{{route('projectname',$portfoliobox->id)}}">
                    <div class="portfolio_box_img"><img src="{{asset('assets/image/'.$portfoliobox->image)}}" alt=""></div>
                    <div class="portfolio_box_name">{{$portfoliobox->filter->portfolios_categories_name}}</div>
                    <div class="portfolio_box_title">{{$portfoliobox->title}}</div>
                </a>
            </div>
            @endforeach


        </div>
    </div>
</div>



@endsection