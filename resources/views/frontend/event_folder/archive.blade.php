@extends('frontend.layout.master')
@section('content')

<main id="event__container">
    <div class="top-banner text-center mb-5"
        style="background-image: url({{asset('uploads/'. $menuContent->image ?? '')}}); background-repeat: no-repeat; background-position: center; background-size: cover;">
        <h1 class="wow fadeInUp" data-wow-delay="0.3s"
            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
            {{$menuContent->page_title}}</h1>
    </div>
    <div class="container">
        <div class="event__wrapper mb-5">
            <div class="row">
                @foreach ($eventContent as $data)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{route('frontendEvent', $data->id )}}">
                        <div class="event_card wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="event__image">
                                <img src="{{asset('uploads/' . $data->image ?? '')}}" alt="" width="100%" height="100%">
                            </div>
                            <div class="event__details">
                                <h4>{{$data->title ?? ''}}</h4>
                                <p>{!! $data->editor ?? '' !!}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                     {{$eventContent->links()}}
                </nav>
            </div>
        </div>
    </div>
</main>

@stop
