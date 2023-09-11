@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{asset('assets/css/aboutus.css')}}">
@endsection
@section('content')

<div class="aboutus_body">
    <div class="aboutus_body_header ">
        <div class="body_header_title container">
            <h1>HAQQIMIZDA</h1>
            <p>Bizi daha yaxından tanıyın</p>
        </div>
    </div>
    <div class="aboutus_body_main" width="1400px">
        <div class="aboutus_body_main_left">
            <img src="./assets/image/a9c600a9-fc51-4a8d-9445-c330688655e0.jpg" alt="">
        </div>
        <div class="aboutus_body_main_right">
            <div class="main_right_content">
                <p class="blue_header">BİZİ DAHA YAXINDAN TANIYIN</p>
                <h1>Rəqəmsal həllər ilə hər zaman yanınızdayıq</h1>
                <p class="main_right_title">Kreativ(bacarıqlı) komandamız və strateji həllərimiz 6 illik fəaliyyət müddətində onlarla tərəfdaşımızın inkişafına, satışlarının artımına və tanınmasına səbəbdir!</p>

                <p class="main_right_title">Tərəfdaşlarımızın inkişafını növbəti səviyyəyə qaldırmaq üçün uzunmüddətli təcrübəmizə əsaslanaraq dizayn, marketinq və biznes problemlərinin öhdəsindən gəlməyi sevirik!</p>

                <button class="aboutus_btn"><a href="">BİZDƏN GÖRÜŞ AL</a></button>
            </div>
        </div>

    </div>
</div>

<div class="our_team  container ">
    <div class="our_team_header ">
        <div class="our_team_header_left">Komandamız</div>
        <div class="our_team_header_right">Hər yeni layihəyə özünəməxsus perspektivlər gətirməyimizə imkan yaradan faktor komandamızın müxtəlif sahələrdəki dərin təcrübəsidir.</div>
    </div>
    <div class="team_slider ">
        <div class="autoplay">
            @foreach($employers as $employer)
            <div class="team_slider_item">
                <div class="team_slider_item_img">
                    <img src="{{asset('assets/image/'.$employer->image)}}" alt="">
                </div>
                <div class="team_slider_item_body">
                    <div class="card_name">{{$employer->name}}</div>
                    <div class="card_position">{{$employer->duty}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection