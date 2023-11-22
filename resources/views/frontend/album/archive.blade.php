@extends('frontend.layout.master')

@section('content')

    <main id="gallery__container">
        <div class="top-banner text-center"
            style="background-image: url({{ asset('uploads/' . $menuContent->image ?? '') }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <h1 class="wow fadeInUp" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                {{ $menuContent->page_title ?? '' }}</h1>
        </div>
        <div class="container">
            <div class="collection_content">
                {{-- <div class="top--title text-center mb-5 mt-4">
                    <h1 class="m-0 wow fadeInDown" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        Title must be here
                    </h1>
                </div> --}}
                <br>
                <br>
                <div class="grid-wrapper mb-5 wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                    @foreach ($gallery as $data)

                    <div class="image-holder">
                        <a href="{{route('frontend.album', $data->id)}}" class="example-image-link">
                            <img src="{{asset('uploads/' . $data->image ?? '')}}" alt="">
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>

@stop
