@extends('frontend.layout.master')
@section('content')

    <main id="event__details-container">
        @if (isset($menuData->banner_image))
            <div class="top-banner text-center mb-5"
                style="background-image: url({{ asset('uploads/' . $menuData->banner_image ?? '') }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
                <h1 class="wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                    {{ $menuData->page_title ?? '' }}</h1>
            </div>
        @endif
        <div class="container">
            <div class="event__details-title text-center mb-4 wow fadeInDown" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                <h3>{{ $event_detail_title->title }}</h3>
            </div>

            <div class="event__details-content">


                    <div class="row mb-5">
                        <div class="col-lg-6 col-md-12">
                            <div class="event_detail-image wow fadeInLeft" data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                <img src="{{ asset('uploads/' . $event_detail->image) ?? '' }}" width="100%" height="100%"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="event_detail-text wow fadeInLeft" data-wow-delay="0.4s"
                                style="visibility: visible; -webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                <div class="date">
                                    <p>{{ $event_detail->date ?? '' }}</p>
                                    <p>
                                        {!! $event_detail->editor ?? '' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="related__slider-holder mb-5 wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                    <div class="related-title text-center mb-3">
                        <h3>Related Events</h3>
                    </div>

                    <!-- Swiper -->
                    <div class="swiper relatedSwiper">
                        <div class="swiper-wrapper">

                            @foreach ($recent_event as $data)
                                <div class="swiper-slide">
                                    <div class="swiper-item">
                                        <a href="#">
                                            <div class="swiper-img">
                                                <img src="{{ asset('uploads/' . $data->image) }}" width="100%"
                                                    height="100%" alt="">
                                            </div>
                                            <div class="swiper-text">
                                                <h6>{{ Str::ucfirst($data->title) ?? '' }}</h6>
                                                <p>{!! Str::limit($data->editor, 50, '...') ?? '' !!}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@stop
@push('scripts')
    <script>
        var swiper = new Swiper(".relatedSwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1400: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
            },
        });
    </script>
@endpush
