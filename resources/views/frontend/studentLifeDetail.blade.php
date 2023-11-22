@extends('frontend.layout.master')

@section('content')


    <main id="studentLife__container">
        <div class="top-banner text-center mb-5"
            style="background-image: url({{ asset('uploads/' . $detailbackgound->bg_image) }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <h1 class="wow fadeInUp" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                Student Life</h1>
        </div>


        <div class="container">

            <div class="card my-5 border"
                style="border-radius: 0; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="student-desc pt-3 px-3">
                            <p>{!! $detail->description !!}</p>

                            <div class="student_name">
                                <h3 class="mb-0">{{ $detail->title }}</h3>
                            </div>
                            <div class="date">
                                <p class="mb-0">{{ $detail->date }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="student-img">
                            <br>
                            <img src="{{ asset('uploads/' . $detail->image) }}" width="100%" height="100%"
                                alt="">

                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>


@stop
