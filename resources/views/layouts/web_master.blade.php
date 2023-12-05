<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <title>{{ $content->com_name }} | @yield('title')</title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset($content->logo) }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&amp;family=Lora:wght@600;700&amp;display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{ asset('website/css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('website/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    {{-- <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    <link href="{{asset('website/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('http://cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
    <script src="{{asset('../unpkg.com/sweetalert%402.1.2/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}"></script>

    <link href="{{asset('https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext')}}" rel="stylesheet">

    {{-- <link rel='stylesheet prefetch' href="{{asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css')}}">
    <link rel='stylesheet' href="{{asset('index.css')}}" />
    <script src='index.js'></script> --}}

    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')}}"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    @include('partials.web_header')
    <!-- Navbar End -->


    @yield('main_content')

    <!-- Footer Start -->
    @include('partials.web_footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    {{-- <script src="{{ asset('website/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('website/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('website/js/lightbox.js') }}"></script>
    <script src="{{ asset('website/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('website/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('website/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('website/js/main.js') }}"></script> --}}

      <script src="{{ asset('website/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('website/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('website/js/lightbox.js') }}"></script>
    <script src="{{ asset('website/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('website/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('website/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js') }}"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css') }}"
        integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Javascript -->
    <script src="{{ asset('website/js/main.js') }}"></script>
    <script>

        $(document).ready(function () {
            $('#itemslider').carousel({
                interval: 3000
            });

            $('.carousel-showmanymoveone .item').each(function () {
                var itemToClone = $(this);

                for (var i = 1; i < 6; i++) {
                    itemToClone = itemToClone.next();

                    if (!itemToClone.length) {
                        itemToClone = $(this).siblings(':first');
                    }

                    itemToClone.children(':first-child').clone()
                        .addClass("cloneditem-" + (i))
                        .appendTo($(this));
                }
            });
        });
    </script>

    @stack('web_script')
</body>

</html>
