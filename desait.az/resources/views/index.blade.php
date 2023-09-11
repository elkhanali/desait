@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
@endsection


@section('content')
<div class="swiper mySwiper ">
    <div class="swiper-wrapper ">
        @foreach($bannerslider as $slider)
        <div class="swiper-slide">
            <img src="{{asset('assets/image/'.$slider->image)}}" alt="">
            <div class="slider_title">
                <h1>{{$slider->title}}</h1>
                <p>{{$slider->desc}}
                </p>

                <div class="slider_buttons">
                    <button class="blue_button"><a href="">Xidmətlərimiz</a></button>
                    <button class="transparent_button"><a href="">PORTFOLIO</a></button>
                </div>

            </div>
        </div>
        @endforeach


    </div>
    <div class="swiper-scrollbar"></div>
</div>
<!-- Services -->
<section class="services container">
    <div class="services_header">
        <div class="services_header_left">Xidmətlərimiz</div>
        <div class="services_header_right">
            <p>Peşəkar komandamız sizin şirkətinizin ehtiyaclarına uyğun olaraq ehtiyacınız olan xidmətləri təyin edib satışlarınızın artırılmasında və brendinizin daha böyük auditoriya tərəfindən tanınmasında sizə kömək edəcək.</p>
            <button><a href="#">Bizimlə Əlaqə</a></button>
        </div>

    </div>

    <div class="services_main">
        <div class="services_boxes">
            @foreach ($servicesboxes as $servicesbox)
            <div class="services_box">
                <div class="services_box_icon"><img src="{{asset('assets/image/'.$servicesbox->image)}}" alt=""></div>
                <div class="services_box_name">{{$servicesbox->name}}</div>
                <div class="services_box_title">{{$servicesbox->desc}}</div>
            </div>
            @endforeach

        </div>
    </div>

</section>

<!-- Portfolio -->
<div class="portfolio container">
    <div class="portfolio_header">
        <div class="portfolio_header_left">Portfoliomuz</div>
        <div class="portfolio_header_right">
            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
    </div>
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
                <div class="portfolio_box_name">{{$portfoliobox->portfolio_boxes_category}}</div>
                <div class="portfolio_box_title">{{$portfoliobox->title}}</div>
            </a>
        </div>
        @endforeach


    </div>

    <div class="portfolio_button">
        <button><a href="">HAMISINA BAX </a></button>
    </div>
</div>

<div class="customers container">
    <div class="customers_header">
        <div class="customers_header_left">Bizi Seçənlər</div>
        <div class="customers_header_right">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</div>
    </div>
    <div class="customer_content">
        <div class="customer_content_left">
            <img src="./assets/image/Rectangle 158.png" alt="">
        </div>
        <div class="customer_content_right">

            @foreach ($choseus as $choseus_img)
            <div class="customer_content_box">
                <img src="{{asset('assets/image/'.$choseus_img->image)}}" alt="">
            </div>
            @endforeach

        </div>
    </div>
</div>


<div class="work_process ">
    <div class="work_process_header container">
        <div class="work_process_header_left">İş prosessimiz</div>

    </div>
    <div class="work_process_content container">


        @foreach ($workprocess as $process)
        <div class="process_box">
            <img src="{{asset('assets/image/'.$process->proccess_icon)}}" alt="">
            <div class="process_name">{{$process->proccess_title}}</div>
            <div class="process_title">{{$process->proccess_desc}}</div>
        </div>
        @endforeach



    </div>
</div>


<div class="helping">
    <div class="helping_body container">
        <h1>Hələ də axtarışdasınız?</h1>
        <p> We’ve helped some of the UK’s most successful businesses with their digital products. Knowing the right approach and then executing isn’t easy. Whatever your need, we’ll be happy to give you the right advice and explore how we can best help.</p>
        <button class="helping_btn">Let’s Talk</button>
    </div>
</div>


<div class="our_team container">
    <div class="our_team_header ">
        <div class="our_team_header_left">Komandamız</div>
        <div class="our_team_header_right">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</div>
    </div>
    <div class="team_slider">
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

<div class="contact_us container">
    <div class="contact_us_header">
        Bizə yazmaqdan çəkinməyin
    </div>
    <div class="contact_us_body">
        <div class="body_left">
            <div class="body_left_text">
                <div>Speak to our Business Director, Steve. With no salespeople, you always get to talk straight to one of our discipline leaders.</div>

                <div>Help us understand what you need by filling out the form and we’ll be in touch.</div>
            </div>
            <div class="body_left_row">
                <div class="address_row">
                    <h1>ADDRESS:</h1>
                    <P>Əhməd Rəcəbli küç, 56.</P>
                </div>
                <div class="contact_row">
                    <h1>ƏLAQƏ:</h1>
                    <p>info@crazyinnovations@gmail.com</p>
                    <p>+994-70-777-77-77</p>
                </div>
            </div>
            <div class="social_row2">
                <h1>SOSIAL:</h1>
                <div class="social_icons">
                    <div><i class="fab fa-whatsapp fa-lg"></i></div>
                    <div><i class="fab fa-instagram fa-lg"></i></div>
                    <div><i class="fab fa-facebook-f fa-lg"></i></div>
                    <div><i class="fab fa-linkedin-in fa-lg"></i></div>
                </div>
            </div>
        </div>
        <div class="body_right">
            <form action="">
                <div class="formControl">
                    <label for="name">Ad / Sirket</label>
                    <br>
                    <input type="text" id="name">
                </div>
                <div class="formControl">
                    <label for="phone">Telefon nomresi</label>
                    <br>
                    <input type="nunmber" id="phone">
                </div>
                <div class="formControl">
                    <label for="email">E-mail</label>
                    <br>
                    <input type="email" id="email">
                </div>
                <div class="formControl">
                    <label for="meaage">Mesajiniz</label>
                    <br>
                    <textarea type="email" id="message" cols="20" rows="10"></textarea>
                </div>

                <button class="form_btn"><a href="#">göndər</a></button>
            </form>
        </div>
    </div>

</div>

@endsection