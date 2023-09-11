<div class="header_component">
    <header>
        <div class="header_top container ">
            <div class="top_left">
                <div class="dark_mode">
                    Dark Mode <img src="{{asset('/assets/image/toggle_off.png')}}" alt="">
                </div>
            </div>
            <div class="top_right">
                <div class="phone_row">
                    <img src="{{asset('/assets/image/phone.png')}}" alt="">
                    <div>+994 12 5655723 </div>
                    <div class="email_row">
                        <img src="{{asset('/assets/image/mail.png')}}" alt="">
                        <div>info@crazyinnovations.az</div>
                    </div>
                    <div class="social_row">
                        <div><i class="fab fa-whatsapp fa-xs"></i></div>
                        <div><i class="fab fa-instagram fa-xs"></i></div>
                        <div><i class="fab fa-facebook-f fa-xs"></i></div>
                        <div><i class="fab fa-linkedin-in fa-xs"></i></div>
                    </div>
                </div>

            </div>

    </header>
    <div class="nav_bar">
        <div class="header_nav container">
            <div class="nav_logo">
                <a href="{{route('front.index')}}"> <img src="{{asset('/assets/image/LOGO.png')}}" alt=""></a>
            </div>
            <div class="nav_menu">
                <ul>
                    <li><a href="{{route('front.index')}}">Əsas Səhifə</a></li>
                    <li><a href="{{route('aboutus')}}">Haqqımızda</a></li>
                    <li class="sub_menu">
                        <a href="">Xidmətlərimiz</a> <img class="sub_menu_btn" src="{{asset('/assets/image/keyboard_arrow_down.png')}}" alt="">
                        <ul class="sub_menu_container ">
                            @foreach($services as $service)
                            <li>
                                <div>
                                    <h1><a href="{{route('service',$service->id)}}">{{$service->name}}</a><img src="{{asset('/assets/image/seo5.png')}}" alt=""></i></h1>
                                    @foreach($service->childe as $child)
                                    <p><a href="">{{$child->name}}</a></p>
                                    @endforeach


                                 
                                </div>
                            </li>
                            @endforeach
                           
                        </ul>
                    </li>
                    <li><a href="{{route('portfolio')}}">Portfolio</a></li>
                    <li><a href="{{route('blog')}}">Bloq</a></li>
                    <li class="nav_bar_button"><a href="">BİZDƏN GÖRÜŞ AL</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>