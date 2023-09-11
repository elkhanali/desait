@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/veb.css')}}">
@endsection
<style>
    .accordion {

        background-color: #ccc;
        /* background-color: #eee; */
        /* color: #444; */
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active,

    button .accordion {
        background-color: #ccc;
    }


    .accordion:hover {
        background-color: #ccc;
    }

    .panel {
        padding: 0 18px;
        display: none;
        /* background-color: white; */
        overflow: hidden;
    }
</style>


@section('content')
<div class="veb_body">
    <div class="veb_body_header">
        <div class="body_header_title container">
            <h1>XİDMƏTLƏRİMİZ <img src="./assets/image/Vector.png" alt="">VEB</h1>
            <p>Build better digital experiences</p>
        </div>
    </div>
    <div class="veb_body_content container">
        <h1>VEB</h1>
        <h2>We Are Able to Provide Your Digital Needs</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <img src="./assets/image/digital-agency-website-designs-tangent 1.png" alt="">
        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem.</p>
    </div>
</div>

<div class="veb_footer container">
    <div class="veb_footer_left">
        @foreach($service_childe as $child)
        <button class="accordion">{{$child->name}}</button>
        <div class="panel">
            <p>{{$child->desc}}</p>
        </div>
        @endforeach
        <button class="accordion">Vebsaytların hazırlanması</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <button class="accordion">E-commerce sistemin qurulması</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <button class="accordion">UX/UI dizayn</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <button class="accordion">Hostinq xidmətləri</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <button class="accordion">Texniki dəstək</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>


    </div>
</div>






<!-- <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
              panel.style.display = "none";
            } else {
              panel.style.display = "block";
            }
          });
        }
        </script> -->


@endsection