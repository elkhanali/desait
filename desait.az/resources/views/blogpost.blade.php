@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/blogpost.css')}}">
@endsection


@section('content')

<div class="blogpost_body">
    <div class="blogpost_body_header">
        <div class="body_header_title container">
            <h1>BLOQ</h1>
            <p>Thoughts. Ideas. Opinion. News.</p>
        </div>
    </div>
    <div class="blogpost_body_content container">
        <div class="blogpost_img">
            <img src="./assets/image/Rectangle 182.png" alt="">
        </div>
        <div class="blogpost_info">
            <div class="blogpost_img_info">Insight : 9 December 2020</div>
            <div class="blogpost_img_social">
                <div class="social_icons">
                    <div><a href=""><i class="fab fa-whatsapp fa-lg"></i></a></div>
                    <div><a href=""><i class="fab fa-instagram fa-lg"></i></a></div>
                    <div><a href=""><i class="fab fa-facebook-f fa-lg"></i></a></div>
                    <div><a href=""><i class="fab fa-linkedin-in fa-lg"></i></a></div>
                </div>
            </div>
        </div>
        <div class="blogpost_main_header">
            Lightspeed Broadband appoints Code as digital partner
        </div>
        <div class="blogpost_main_content">
            <p>New ISP challenger brand Lightspeed Broadband has partnered with Code to develop a full digital identity and suite of digital products as the business embarks on an ambitious roll out of its full-fibre gigabit broadband services.</p>
            <br>

            <p> Lightspeed aims to bring full-fibre optic connections directly to 100,000 homes and businesses across the East of England by 2022, and has already deployed over one hundred engineers to start building the network in ten towns across the region, with ambitions to expand and reach 1 million homes by 2025.</p>
            <br>

            <p> Code’s remit is to create a digital infrastructure and strategy, develop the digital brand and marketing website, as well as create a customer portal design and interface.</p>
            <br>

            <p> We’ll also work with Lightspeed to devise a customer experience across SalesForce and other connected technologies, creating a unified customer experience and provide ongoing technical and future direction strategy for the internet service provider.</p>
            <br>

            <p> Steve Haines, CEO of Lightspeed Broadband, said: “Our website and digital capabilities need to be as slick, fast and reliable as the broadband that we are delivering into people’s homes and businesses. We’re happy to be working with Code and are confident that they are the partner to make that happen.</p>
            <br>

            <p>“Their expertise, insight and understanding of what is required to create an unrivalled digital experience will help support our plans to reach 100,000 homes and businesses across the East of England by 2022.</p>
            <br>

            <p>“Collaborating with communities and local authorities, we started the roll out of our full fibre broadband to ten towns across South Lincolnshire and West Norfolk in April.”
            </p>
            <br>

            <p> Rob Jones, Managing Director at Code said: “High speed, reliable broadband has become even more important to our lives over the past year or so as we appreciate the importance of connectivity – this is only set to grow further. Lightspeed is focused on making a difference in communities that are currently being underserved by the existing infrastructure and have investment and a hugely experienced senior team to help them reach their ambitious targets.</p>
            <br>

            <p> “We are excited to play a role in this journey. As a new to the market challenger brand, there is huge potential to create a cut-through digital experience that will rival, and exceed, that of the existing big players.</p>
            <br>

            <p>”For Lightspeed, we will be implementing a full suite of services – from design and UX through to technical strategy. We will be creating a unified customer experience which will include a customer portal and interface design.”</p>
        </div>
    </div>
</div>

<div class="recent_post container">
    <div class="recent_post_header">
        Recent Posts
    </div>
    <div class="recent_post_content">
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