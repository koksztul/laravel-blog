<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!--

    Template 2103 Central

	http://www.tooplate.com/view/2103-central

    -->
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ mix('/css/app.css')}} ">
    <!-- tooplate style -->

    <script>
        var renderPage = true;

        if (navigator.userAgent.indexOf('MSIE') !== -1
            || navigator.appVersion.indexOf('Trident/') > 0) {
            /* Microsoft Internet Explorer detected in. */
            alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
            renderPage = false;
        }
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="{{ url('/') }}">Home</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @can('manage-posts')
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.post.create') }}">Create <span class="sr-only">(current)</span></a>
            </li>
            @endcan
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('contact') }}">Contact <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="q" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
          <ul class="navbar-nav mt-2 mt-lg-0">
            @auth
            <li class="nav-item active">
                <a class="nav-link text-primary">{{ Auth::user()->name }}</a>
            </li>  
            <li class="nav-item active">
                <a class="nav-link" href="#logout">Logout <span class="sr-only">(current)</span></a>
            </li>  
            @else
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('login')}}">Login/Register <span class="sr-only">(current)</span></a>
            </li>
            @endauth
        </ul>
        </div>
      </nav>
    
    <section class="row d-flex justify-content-center">
        <div class="col-md-6">
             
        </div>
    </section>
      
    <div class="container">
        <section class="tm-section-head" id="top">
            <header id="header" class="text-center tm-text-gray">
                <h1>CENTRAL</h1>
                <p>NEW TEMPLATE FOR YOU</p>
            </header>

        </section>
        
        <section class="row" id="tm-section-1">
            <div class="col-lg-12 tm-slider-col">
                <div class="tm-img-slider">
                    <div class="tm-img-slider-item" href="{{ asset('img/gallery-img-01.jpg') }}">
                        <p class="tm-slider-caption">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <img src="{{ asset('images/gallery-img-01.jpg') }}" alt="Image" class="tm-slider-img">
                    </div>
                    <div class="tm-img-slider-item" href="{{ asset('img/gallery-img-02.jpg') }}">
                        <p class="tm-slider-caption">Curabitur justo nisl, elementum a mollis sed.</p>
                        <img src="{{ asset('images/gallery-img-02.jpg') }}" alt="Image" class="tm-slider-img">
                    </div>
                    <div class="tm-img-slider-item" href="{{ asset('img/gallery-img-03.jpg') }}">
                        <p class="tm-slider-caption">Suspendisse sodales elit non metus dictum blandit.</p>
                        <img src="{{ asset('images/gallery-img-03.jpg') }}" alt="Image" class="tm-slider-img">
                    </div>
                    <div class="tm-img-slider-item" href="{{ asset('img/gallery-img-04.jpg') }}">
                        <p class="tm-slider-caption">Aliquam sed molestie tortor, mollis auctor neque.</p>
                        <img src="{{ asset('images/gallery-img-04.jpg') }}" alt="Image" class="tm-slider-img">
                    </div>
                </div>
            </div>
        </section>
        
        <section class="tm-section-2 tm-section-mb" id="tm-section-2">
            
        </section>

        <section class="tm-section-3 tm-section-mb" id="tm-section-3">
           @yield('content')
        </section>
            @yield('pagination')
        <section class="tm-section-4 tm-section-mb" id="tm-section-4">
            <div class="row">

            </div>
        </section>

        <section class="tm-section-5" id="tm-section-5">
            
        </section>

        <footer class="mt-5">
            <p class="text-center">Copyright © 2018 Your Company Name - Design:
                <a rel="nofollow" href="{{ asset('http://www.tooplate.com/view/2103-central') }}" target="_parent" class="tm-text-black">Central</a>
            </p>
        </footer>
    </div>
        
    <script src="{{ mix('/js/app.js') }}"></script>

    @include('partials.message') 
    
    <script type="text/javascript">
        @yield('javascript');
    </script>
    @yield('js-files');
    <!-- https://getbootstrap.com/ -->
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
    
    <!-- Slick Carousel -->
    <script>
        function setCarousel() {
            var slider = $('.tm-img-slider');

            if (slider.hasClass('slick-initialized')) {
                slider.slick('destroy');
            }

            if ($(window).width() > 991) {
                // Slick carousel
                slider.slick({
                    autoplay: true,
                    fade: true,
                    speed: 800,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            } else {
                slider.slick({
                    autoplay: true,
                    fade: true,
                    speed: 800,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            }
        }

        $(document).ready(function () {
            if (renderPage) {
                $('body').addClass('loaded');
            }

            setCarousel();

            $(window).resize(function () {
                setCarousel();
            });

            // Close menu after link click
            $('.nav-link').click(function () {
                $('#mainNav').removeClass('show');
            });

            // https://css-tricks.com/snippets/jquery/smooth-scrolling/
            // Select all links with hashes
            $('a[href*="#"]')
                // Remove links that don't actually link to anything
                .not('[href="#"]')
                .not('[href="#0"]')
                .click(function (event) {
                    // On-page links
                    if (
                        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                        &&
                        location.hostname == this.hostname
                    ) {
                        // Figure out element to scroll to
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        // Does a scroll target exist?
                        if (target.length) {
                            // Only prevent default if animation is actually gonna happen
                            event.preventDefault();
                            $('html, body').animate({
                                scrollTop: target.offset().top + 1
                            }, 1000, function () {
                                // Callback after animation
                                // Must change focus!
                                var $target = $(target);
                                $target.focus();
                                if ($target.is(":focus")) { // Checking if the target was focused
                                    return false;
                                } else {
                                    $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                    $target.focus(); // Set focus again
                                };
                            });
                        }
                    }
                });
        });
    </script>
    @auth
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>

    <script>
        document.querySelector("a[href='#logout']").addEventListener("click", function(e) {
            e.preventDefault();

            document.querySelector("#logout-form").submit();
        }, false);
    </script>
    @endauth
</body>

</html>