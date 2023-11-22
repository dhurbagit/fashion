@extends('frontend.layout.master')

@section('content')


    <main id="download__container">
        <div class="top-banner text-center mb-5"
            style="background-image: url({{ asset('uploads/' . $menuContent->banner_image ?? '') }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <h1 class="wow fadeInUp" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                {{ $menuContent->page_title ?? '' }}</h1>
        </div>
        <div class="container">
            <table class="table table-bordered table-hover mb-5  wow fadeInUp" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                <tr class="text-center">
                    <th style="width: 5%;">S.N</th>
                    <th style="width: 50%;">Title</th>
                    <th style="width: 15%;">Date</th>
                    <th style="width: 15%;">Download</th>
                </tr>

                @foreach ($downloadContent as $data)
            
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td class="text-start">{{$data->title ?? ''}}</td>
                        <td>{{$data->date ?? ''}}</td>
                        <td><a href="{{$data->image ?? ''}}" download><i class="fa fa-download"></i></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
@stop
