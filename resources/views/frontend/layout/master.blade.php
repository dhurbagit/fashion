<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/engine1/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/wow slider/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/lightbox2-2.11.3/dist/css/lightbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/wow slider/animate.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>NIAFT</title>
</head>

<body>

    @include('frontend.layout.header')


    @yield('content')


    @include('frontend.layout.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{asset('frontend/assets/engine1/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/engine1/wowslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/engine1/script.js')}}"></script>
    <script src="{{asset('frontend/assets/JS/animation.js')}}"></script>
    <script src="{{asset('frontend/assets/JS/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/JS/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
    <script src="{{asset('frontend/assets/JS/animation.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        // toster ja
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    @stack('scripts')

</body>


</html>
