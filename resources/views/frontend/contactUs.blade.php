@extends('frontend.layout.master')


@section('content')

    <main id="contact__container">
        <div class="top-banner text-center mb-5"
            style="background-image: url({{ asset('uploads/' . $menuContent->banner_image ?? '') }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <h1 class="wow fadeInUp" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                {{ $menuContent->page_title ?? '' }}</h1>
        </div>
        <div class="container">
            <div class="contactContent">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contentLeft wow fadeInDown" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="topContent">
                                <h1>Get in touch with us!</h1>
                                <p>
                                    {{ setting()->quote ?? '' }}
                                </p>
                            </div>
                            <div class="bottomContent">
                                <div class="location">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <div class="detail">
                                        <h3>Location</h3>
                                        <p> {{ setting()->address ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="email">
                                    <i class="fa-solid fa-envelope"></i>
                                    <div class="detail">
                                        <h3>Email Us </h3>
                                        <p> {{ setting()->email ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="phone">
                                    <i class="fa-solid fa-phone"></i>
                                    <div class="detail">
                                        <h3>Phone Us</h3>
                                        <p> {{ setting()->phone ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contentRight wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="center">
                                <p>IF YOU GOT ANY QUESTIONS
                                    PLEASE DO NOT HESITATE TO SEND US A MESSAGE</p>

                                <form action="{{ route('ContactUs.page.index') }}" method="post">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="name" class="form-control" name="name" id="floatingInput"
                                            value="{{ old('name') }}" placeholder="Name">
                                        <label for="floatingName">Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="contact" class="form-control" name="contact" id="floatingInput"
                                            value="{{ old('contact') }}" placeholder="Contact">
                                        <label for="floatingContact">Contact</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" id="floatingInput"
                                            value="{{ old('email') }}" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="message" placeholder="Send Message" id="floatingTextarea2" style="height: 100px">
                                        {{ old('message') }}
                                        </textarea>
                                        <label for="floatingTextarea2">Send Message</label>
                                    </div>
                                    <div class="g-recaptcha" data-sitekey={{ setting()->site_key ?? '' }}>
                                    </div>
                                    <br>
                                    @if (Session::has('g-recaptcha-response'))
                                        <span class="text-danger">{{ Session::get('g-recaptcha-response') }}</span>
                                    @endif
                                    <div class="d-flex justify-content-end">
                                        <input type="submit" value="Send Message">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map mb-5 wow fadeInUp" data-wow-delay="0.3s"
                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                <div class="google_map_wrapper">
                    {!! setting()->google_map ?? '' !!}
                </div>

            </div>
        </div>
    </main>

@stop
