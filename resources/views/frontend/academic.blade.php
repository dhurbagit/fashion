@extends('frontend.layout.master')

@section('content')

    <main id="academic__container">
        <div class="top-banner text-center mb-5"
            style="background-image: url({{ asset('uploads/' . ($menuContent->banner_image ?? '')) }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <h1 class="wow fadeInUp" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                {{ $menuContent->name ?? '' }}</h1>
        </div>
        <div class="container">
            <div class="top__title text-center mb-5 wow fadeInDown" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                <h2>{{ $academic_section->section_heading ?? '' }}</h2>
                <h5>{{ $academic_section->section_subCaption ?? '' }}</h5>
            </div>
            @foreach ($academic as $key => $data)
                <div class="row mb-4 {{ $key % 2 == 0 ? 'order1' : '' }}">
                    <div class="{{ $key % 2 == 0 ? 'order1' : '' }} col-lg-7 col-md-12 col-sm-12 wow fadeInLeft"
                        data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        <div class="top--title">
                            <h2>{{ $data->heading1 ?? '' }}</h2>
                        </div>
                        <div class="content-wrapper">
                            <p>{!! $data->editor ?? '' !!}</p>
                        </div>
                        <div class="top--title">
                            <h2>{{ $data->heading2 ?? '' }}</h2>
                        </div>
                        {!! $data->description1 ?? '' !!}
                    </div>
                    <div class="{{ $key % 2 == 0 ? 'order2' : '' }} col-lg-5 col-md-12 col-sm-12 wow fadeInLeft"
                        data-wow-delay="0.4s"
                        style="visibility: visible; -webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                        <div class="main__image">
                            <img src="{{ asset('uploads/' . $data->image) }}" width="100%" height="100%" alt="">
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </main>

@stop
