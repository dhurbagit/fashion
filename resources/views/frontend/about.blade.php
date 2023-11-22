@extends('frontend.layout.master')

@section('content')

    <main>
        <section id="aboutUs__container">
            <div class="top-banner text-center"
                style="background-image: url({{ asset('uploads/' . $menuContent->image) }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
                <h1 class="wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                    {{ $menuContent->page_title ?? '' }}</h1>
            </div>
            <div class="about__us-content py-5">
                <div class="container">
                    @foreach ($aboutContent as $data)
                        <div class="row">
                            <div class="col-xl-5 col-lg-12">
                                <div class="content__wrapper wow fadeInLeft" data-wow-delay="0.3s"
                                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                    <div class="top--title">
                                        <h1>{{ $data->heading_one ?? '' }}</h1>
                                    </div>
                                    <div class="content">
                                        <h1> {{ $data->sub_heading ?? '' }} </h1>
                                        <p>
                                            {!! $data->editor ?? '' !!}
                                        </p>
                                    </div>
                                    <div class="top--title">
                                        <h1>We Believe in</h1>
                                    </div>
                                    <div class="list_style_wrapper content-list fa-ul">
                                        {!! $data->description1 ?? '' !!}
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-12">
                                <div class="row">
                                    <div class="col-md-7 col-sm-12">
                                        <div class="flex-img wow fadeInLeft" data-wow-delay="0.4s"
                                            style="visibility: visible; -webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                            <img src="{{ asset('uploads/' . $data->image1 ?? '') }}" alt=""
                                                width="100%" height="100%">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-12 hidden__sec">
                                        <div class="col pb-2">
                                            <div class="flex-img1 wow fadeInDown" data-wow-delay="0.4s"
                                                style="visibility: visible; -webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                                <img src="{{ asset('uploads/' . $data->image2 ?? '') }}" alt=""
                                                    width="100%" height="100%">
                                            </div>
                                        </div>
                                        <div class="col pt-3">
                                            <div class="flex-img1 wow fadeInUp" data-wow-delay="0.4s"
                                                style="visibility: visible; -webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                                <img src="{{ asset('uploads/' . $data->image3 ?? '') }}" alt=""
                                                    width="100%" height="100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="container">
                    <div class="row">
                        <div class="mission_vission_wrapper">
                            @foreach ($missionContent as $data)
                                <div class="col-lg-12">
                                    <h1>{{ $data->title ?? '' }}</h1>
                                    <p>{!! $data->editor ?? '' !!}</p>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="aboutUs__counter"
                style="background-image: url({{ asset('frontend/assets/Images/bg-about.png') }}); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed; height: auto;">
                <div class="overlap">
                    <div class="container">
                        <div class="counter">
                            @foreach ($counter_detail as $data)
                                <div class="row justify-content-center">

                                    <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                                        <div class="conter-list text-center wow fadeInLeft" data-wow-delay="0.3s"
                                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                            <h1>
                                                <i class="fa-solid fa-users"></i>
                                            </h1>
                                            <h2><span class="count-digit">{{ $data->counter1 ?? '' }}</span>+</h2>
                                            <p>{{ $data->counterTitle1 ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                                        <div class="conter-list text-center wow fadeInLeft" data-wow-delay="0.4s"
                                            style="visibility: visible; -webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                            <h1>
                                                <i class="fa-solid fa-users-gear"></i>
                                            </h1>
                                            <h2><span class="count-digit">{{ $data->counter2 ?? '' }}</span>+</h2>
                                            <p>{{ $data->counterTitle2 ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                                        <div class="conter-list text-center wow fadeInLeft" data-wow-delay="0.5s"
                                            style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                                            <h1>
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </h1>
                                            <h2><span class="count-digit">{{ $data->counter3 ?? '' }}</span>+</h2>
                                            <p>{{ $data->counterTitle3 ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                                        <div class="conter-list text-center wow fadeInLeft" data-wow-delay="0.5s"
                                            style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                                            <h1>
                                                <i class="fa-solid fa-user-group"></i>
                                            </h1>
                                            <h2><span class="count-digit">{{ $data->counter4 ?? '' }}</span>+</h2>
                                            <p>{{ $data->counterTitle4 ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-section section-padding">
                <div class="container">
                    <div class="text-center mb-5">
                        <div class="top--title wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <h1 class="m-0">
                                Our Team
                            </h1>
                        </div>
                        <h1 class="m-0 wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            Meet With Professional Designer</h1>
                    </div>
                    <div class="row justify-content-center">
                        
                        @foreach ($ourTeam as $data)
                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                <div class="team-holder wow fadeInLeft" data-wow-delay="0.3s"
                                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                    <img src="{{ asset('uploads/' . $data->image ?? '') }}" width="100%" height="100%"
                                        alt="">
                                    <div class="social_media">
                                        <a href="{{ $data->facbook_link ?? '' }}" class="me-3">
                                            <i class="fa-brands fa-square-facebook"></i>
                                        </a>
                                        <a href="{{ $data->instagram_link ?? '' }}" class="me-3">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                        <a href="{{ $data->linked_link ?? '' }}" class="me-3">
                                            <i class="fa-brands fa-linkedin"></i>
                                        </a>
                                    </div>
                                    <div class="name_wrapper">
                                        <div class="text text-center">
                                            <h1 class="mb-0">{{ $data->name ?? '' }}</h1>
                                            <h5>{{ $data->designation ?? '' }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>


@stop
