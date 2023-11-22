@extends('backend.layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-4">
            <a href="{{route('online_form.table.list')}}">
                <div class="dash-count">

                    <div class="dash-counts">
                        <h4>{{ $online_form }}</h4>
                        <h5>Online Form</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user"></i>
                    </div>

                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a href="{{route('ContactUs.page.index')}}">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>{{ $contactUs }}</h4>
                        <h5>Contact form</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>

@stop
