@extends('frontend.layout.master')
@section('content')

    <main id="main__body-section">
        <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    @foreach ($datas['slider'] as $data)
                        <li><img src="{{ asset('uploads/' . $data->image ?? '') }}" alt="bootstrap slideshow"
                                title="{{ $data->title_one ?? '' }}" id="wows1_0" />{{ $data->title_two ?? '' }}<br> <button
                                class="btn btn-gradient mt-5">Explore
                                More</button></li>
                    @endforeach
                </ul>
            </div>
            <div class="ws_shadow"></div>
        </div>

        <div class="partner_companies">
            <div class="container">
                <ul class="companies d-flex justify-content-between align-items-center flex-wrap py-4">
                    <div class="owl-carousel" id="client_slider">
                        @foreach ($datas['client'] as $data)
                            <div class=" wow fadeInLeft" data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                <img src="{{ asset('uploads/' . $data->image ?? '') }}" width="100%" height="100%"
                                    alt="">
                            </div>
                        @endforeach
                    </div>
                </ul>
            </div>
        </div>


        <div class="show__section"
            style="background-image:url('{{ asset('uploads/' . ($datas['advertisement_sectionBg']->bg_image ?? '')) }}')">
            <div class="overflow section-padding">
                <div class="container">
                    <div class="section__content">
                        <div class="row align-items-center">
                            @foreach ($datas['advertisement'] as $data)
                                <div class="col-md-6 py-4">
                                    <div class="show__content wow fadeInUp" data-wow-delay="0.3s"
                                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                        <span>{{ ucfirst($data->sub_title) }}</span>
                                        <h1>{{ ucfirst($data->heading) }}</h1>
                                        <p>{!! Str::limit($data->description, 10, '') !!}</p>
                                        <a href="{{ route('advertisement.page.show', $data->id )}}" class="btn btn-gradient">Explore More</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="show__banner wow fadeInUp" data-wow-delay="0.3s"
                                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                        <img src="{{ asset('uploads/' . $data->image) }}" alt="" width="100%"
                                            height="100%">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="choose__us-content">
            <div class="container">
                <div class="section__wrapper">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="img__holder px-2 wow fadeInLeft" data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                <img src="{{ asset('uploads/' . ($datas['chooseUs']->image ?? '')) }}" alt="Image"
                                    width="100%" height="100%">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content wow fadeInUp" data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                <h2>{{ $datas['chooseUs']->title ?? '' }}</h2>
                                <p>
                                    {!! Str::limit($datas['chooseUs']->description ?? '', 280, '...') !!}
                                </p>
                            </div>
                            <div class="conter__holder d-flex justify-content-center flex-wrap align-items-center wow fadeInUp"
                                data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                <div class="left__counter text-center pe-4">
                                    <h1><span class="count-digit">{{ $datas['chooseUs']->counter_one ?? '' }}</span>+</h1>
                                    <p>{{ $datas['chooseUs']->counter_caption_one ?? '' }}</p>
                                </div>
                                <div class="right__counter text-center ps-4">
                                    <h1><span class="count-digit">{{ $datas['chooseUs']->counter_two ?? '' }}</span>+</h1>
                                    <p>{{ $datas['chooseUs']->counter_caption_two ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="student__life py-3 mb-5">
            <div class="container">
                <div class="section-title text-center mb-3 wow fadeInDown" data-wow-delay="0.3s"
                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                    <h3>{{ $datas['studentLife_sectionBg']->section_title ?? '' }}</h3>
                </div>
                <div class="row justify-content-center">

                    @foreach ($datas['studentLife'] as $data)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="white-box p-0 wow fadeInLeft" data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                <div class="image__content">
                                    <img src="{{ asset('uploads/' . $data->image ?? '') }}" width="100%" height="100%"
                                        alt="">
                                </div>
                                <div class="box-content p-4">
                                    <h3 class="mb-0">{{ $data->title ?? '' }}</h3>
                                    <p class="mb-0">{{ $data->date }}</p>
                                    <span>{!! Str::limit($data->description ?? '', 200, '...') !!}</span>
                                </div>
                                <a href="{{ route('studentLIfeDetail.front.show', $data->id) }}"
                                    class="bottom-btn d-flex justify-content-between align-items-center">
                                    <span>View More</span>
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="event__section mb-5">
            <div class="container">
                <div class="row py-4">
                    <div class="col-lg-8 col-md-12">
                        <div class="video wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <iframe width="100%" height="520" src="{{ $datas['youtube']->link ?? '' }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="upcoming_events px-3 pt-3 pb-0 wow fadeInDown" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <h1>{{ $datas['events_section']->title ?? '' }}</h1>
                            <p class="mb-4">
                                {!! Str::limit($datas['events_section']->editor ?? '...', 180, '') !!}
                            </p>

                            <ul class="event__lists">
                                @foreach ($datas['event_detail'] as $data)
                                    <li class="mb-3">
                                        <a href="{{route('frontendEvent', $data->id )}}">
                                            <div class="row align-items-center">
                                                <div class="col-md-3">
                                                    <div class="date text-center">
                                                        <h2 class="mb-0 text-light">
                                                            {{ Carbon\Carbon::parse($data->date ?? '')->format('d') }}</h2>
                                                        <h4 class="mb-0 text-light">
                                                            {{ Carbon\Carbon::parse($data->date ?? '')->format('M') }}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="text__wrapper">
                                                        <h6>{{ $data->title ?? '' }}</h6>
                                                        <span>
                                                            {!! strip_tags(Str::limit($data->editor ?? '', 120, '')) !!}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="gallery__wrapper mb-5">
            <div class="container-fluid">
                <div class="gallery__title text-center">
                    <h2>Our <span>Gallery</span></h2>
                    <p>{{ $datas['gallery_section']->title ?? '' }}</p>
                </div>
                <div class="gallery__images-list">
                    <div class="row">
                        @foreach ($datas['gallery'] as $data)
                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <a href="{{ route('frontend.album', $data->id) }}">
                                    <div class="gallery__images wow fadeInUp" data-wow-delay="0.3s"
                                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                        <img src="{{ asset('uploads/' . $data->image) }}" width="100%" height="100%"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



    </main>


@stop
