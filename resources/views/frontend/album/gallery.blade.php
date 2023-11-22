@extends('frontend.layout.master')

@section('content')

    <main id="gallery__container">
        @if (isset($menuData->image))
            <div class="top-banner text-center"
                style="background-image: url('{{ asset('uploads/' . $menuData->image ?? '') }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
                <h1 class="wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                    {{ $menuData->page_title ?? '' }}</h1>
            </div>
        @endif


        <div class="container">
            <div class="collection_content">
                <div class="top--title text-center mb-5 mt-4">
                    <h1 class="m-0 wow fadeInDown" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        {{ Str::ucfirst($title_album->title) ?? '' }}
                    </h1>
                </div>
                <div class="grid-wrapper mb-5 wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                    @foreach ($show_gallery as $key => $data)
                        <div class="image-holder {{ $key == 1 ? 'tall' : '' }} {{ $key == 2 ? 'wide' : '' }}">
                            <a class="example-image-link" href="{{ asset('uploads/' . $data->image ?? '') }}"
                                data-lightbox="example-set">
                                <img src="{{ asset('uploads/' . $data->image ?? '') }}" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>



@stop
