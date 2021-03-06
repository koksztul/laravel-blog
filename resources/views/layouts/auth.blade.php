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
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ asset('font-awesome-4.5.0/css/font-awesome.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tooplate-style.css') }}">
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
            <li class="nav-item active">
              <a class="nav-link" href="#">Contact <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
          <ul class="navbar-nav mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('login')}}">Login <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        </div>
      </nav>
    
    <section class="row d-flex justify-content-center">
        <div class="col-md-6">
            @include('partials.message')  
        </div>
    </section>
      
    <div class="container">
        
        <section class="tm-section-2 tm-section-mb" id="tm-section-2">
            
        </section>

        <section class="tm-section-3 tm-section-mb" id="tm-section-3">
           @yield('content')
        </section>
            @yield('pagination')

        <section class="tm-section-5" id="tm-section-5">
            
        </section>

        <footer class="mt-5">
            <p class="text-center">Copyright ?? 2018 Your Company Name - Design:
                <a rel="nofollow" href="{{ asset('http://www.tooplate.com/view/2103-central') }}" target="_parent" class="tm-text-black">Central</a>
            </p>
        </footer>
    </div>
        
    <script src="{{ mix('/js/app.js') }}"></script>

    <!-- load JS files -->
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- https://popper.js.org/ -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
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

</body>

</html>