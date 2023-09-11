<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: true,
    scrollbar: {
      el: ".swiper-scrollbar",
      hide: true,
    },
  });
</script>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script type="text/javascript">
  $('.autoplay').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 500,
    arrows: false
  });
</script>



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
</script>


<script>
  const getData = async (url) => {
    const res = await fetch(url);
    return await res.json()
  }

  function filter(wrapperSelector, triggersSelector) {
    const wrapper = document.querySelector(wrapperSelector),
      triggers = document.querySelectorAll(triggersSelector);

    triggers.forEach(trigger => {
      trigger.addEventListener('click', (e) => {
        wrapper.innerHTML = ''
        if (document.querySelector('.portfolio_button')) {
          document.querySelector('.portfolio_button').style.display = "none"
        }

        // let spinner =
        //   `
        //                 <div style="margin: 0 auto; width: 80px; height: 80px" class="spinner spinner-border" role="status">
        //                     <span class="sr-only">Loading...</span>
        //                 </div>
        //                 `
        // wrapper.insertAdjacentHTML('beforeend', spinner)

        let id = e.target.getAttribute('data-id');

        getData('http://127.0.0.1:8000/get_portfolio/' + id).then(res => {
          console.log(res)
          wrapper.innerHTML = ''
          if (document.querySelector('.portfolio_button')) {
            document.querySelector('.portfolio_button').style.display = "flex"
          }

          JSON.parse(res).forEach(item => {


            let element =
              `
                          <div class="portfolio_box">
                            <a href="{{route('projectname', 5)}}">
                                <div class="portfolio_box_img"><img src="{{asset('assets/image/${item.image}')}}" alt=""></div>
                                <div class="portfolio_box_name">${item?.filter.portfolios_categories_name}</div>
                                <div class="portfolio_box_title">${item.title}</div>
                            </a>
                        </div>
                        `
            wrapper.insertAdjacentHTML('beforeend', element)
          })

        })
      })
    })
  }
  filter('.portfolio_boxes', '.portfolio_menu li a')
</script>