@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/smm.css')}}">
@endsection



    @section('content')
    <div class="smm_body">  
        <div class="smm_body_header ">
            <div class="body_header_title container">
                <h1>XİDMƏTLƏRİMİZ <img src="./assets/image/Vector.png" alt="">SMM</h1>
                <p>Build better digital experiences</p>
            </div>
        </div>
        <div class="smm_body_content container">
            <h1>SMM NƏDİR?</h1>
            <h2>We Are Able to Provide Your Digital Needs</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <img src="./assets/image/digital-agency-website-designs-tangent 1.png" alt="">
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem.</p>
        </div>
    </div>

    <div class="smm_footer container">
        <div class="smm_footer_left">
            <button class="accordion">Facebook</button>
        <div class="panel">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        
        <button class="accordion">Instagram</button>
        <div class="panel">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        
        <button class="accordion">Youtube</button>
        <div class="panel">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <button class="accordion">Linkedin</button>
        <div class="panel">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <button class="accordion">Telegram</button>
        <div class="panel">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <button class="accordion">Twitter</button>
        <div class="panel">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        </div>

        <div class="smm_footer_right">
           <div class="smm_form">
            <div class="smm_footer_right_header">SEO üçün başlıq</div>
            <form action="">
                <label for="name">Ad  / Şirkət</label>
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
    
   
    
<!--     
        <script>
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
    
