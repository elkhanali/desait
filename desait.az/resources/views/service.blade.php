@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{asset('assets/css/smm.css')}}">
@endsection


@section('content')


<div class="smm_body">
    <div class="smm_body_header ">
        <div class="body_header_title container">
            <h1>XİDMƏTLƏRİMİZ <img src="{{asset('./assets/image/Vector.png')}}" alt="">{{$service->name}}</h1>
            <p>{{$service->service_detail }}</p>
        </div>
    </div>
    <div class="smm_body_content container">
        <h1>{{$service->name}} NƏDİR?</h1>
        <h2>{{$service->service_header}}</h2>
        <img src="{{asset('assets/image/'.$service->service_image)}}" alt="">
        <p>{{$service->service_desc}}</p>


    </div>
</div>

<div class="smm_footer container">
    <div class="smm_footer_left">
        @foreach($service->childe as $child)
        <button class="accordion">{{$child->name}}</button>
        <div class="panel">
            <p>{{$child->desc}}</p>
        </div>
        @endforeach
      
    </div>

    <div class="smm_footer_right">
        <div class="smm_form">
            <div class="smm_footer_right_header">SEO üçün başlıq</div>
            <form action="">
                <label for="name">Ad / Şirkət</label>
                <br>
                <input type="text" name="name" id="name">
                <br>
                <label for="mail">Telefon nömrəsi / E-mail</label>
                <br>
                <input type="email" name="mail" id="mail">
                <br>
                <label for="mail">Vebsayt URL</label>
                <br>
                <input type="email" name="mail" id="mail">
                <br>
                <button class="smm_form_btn"><a href="">müracİət et</a></button>
            </form>
        </div>
    </div>
</div>




@endsection