@extends('frontend.layout.master')
@section('content')

    <main id="event__details-container">
        <div class="top-banner text-center mb-5"

            style="background-image: url({{ asset('uploads/' . $backgroundAds->bg_image ?? '') }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <h1 class="wow fadeInUp" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                {{ $show_listBanner->sub_title ?? '' }}</h1>
        </div>
        <div class="container">
            <div class="event__details-title text-center mb-4 wow fadeInDown" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                <h3>{{$show_listBanner->title}}</h3>
            </div>

            <div class="event__details-content">
                @foreach ($show_list as $data)
                    <div class="row mb-5">
                        <div class="col-lg-6 col-md-12">
                            <div class="event_detail-image wow fadeInLeft" data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                <img src="{{ asset('uploads/' . $data->image) ?? '' }}" width="100%" height="100%"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="event_detail-text wow fadeInLeft" data-wow-delay="0.4s"
                                style="visibility: visible; -webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                <div class="date">
                                    <p>
                                        {!! $data->description ?? '' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </main>

@stop
@push('scripts')

@endpush
