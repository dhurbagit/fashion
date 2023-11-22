<footer id="footer">
    <section id="top-footer">
        <div class="footer__wrapper py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3 wow fadeInUp" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        <div class="footer__img mb-4">
                            <img src="{{ asset('uploads/' . (setting()->image ?? '')) }}" alt="" width="100%"
                                height="100%">
                        </div>
                        <div class="footer__details">
                            <table>
                                <tr>
                                    <td class="text-center pe-1"><i class="fa-solid fa-location-dot"></i></td>
                                    <td> {{ setting()->address ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center pe-1"><i class="fa-solid fa-envelope"></i></td>
                                    <td> {{ setting()->email ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center pe-1"><i class="fa-solid fa-phone"></i></td>
                                    <td> {{ setting()->phone ?? '' }}</td>
                                </tr>
                            </table>
                            <a href="AboutUs.html" class="btn btn-gradient mt-4">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3 wow fadeInUp" data-wow-delay="0.4s"
                        style="visibility: visible; -webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                        <div class="footer__title">
                            <span>Quick Links</span>
                        </div>
                        <ul>
                            @foreach ($fmenus as $mainMenu)
                                @if ($mainMenu->publish_status == 1)
                                    <li class="nav-item">

                                        <a class="nav-link {{ request()->is('category/' . $mainMenu->name) ? 'active' : '' }}"
                                            @if ($mainMenu->category_slug == 'page') href="{{ $mainMenu->external_link ?? route('page', $mainMenu->title_slug) }}"
                                @else
                                    href="{{ $mainMenu->external_link ?? route('category', $mainMenu->category_slug) }}" @endif>
                                            {{ Str::ucfirst($mainMenu->name) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                            <li><a href="apply-form.html">Apply Online</a></li>
                            <li><a href="{{url('login')}}">Login</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3 wow fadeInUp" data-wow-delay="0.5s"
                        style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                        <div class="footer__title">
                            <span>Follow Us</span>
                        </div>
                        <div class="qr__img">
                            <img src="{{ asset('uploads/' . (setting()->image1 ?? '')) }}" alt=""
                                width="100%" height="100%">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-0 col-sm-0"></div>
                </div>
            </div>
        </div>
    </section>
    <div class="bottom__footer">
        <div class="container">
            <div class="d-flex justify-content-md-between justify-content-sm-center flex-wrap py-2">
                <div class="copyright me-2 text-md-end text-sm-center">
                    Copyright Allstar Technology. All Right Reserved
                </div>
                <div class="social-links d-flex justify-content-end text-md-end text-sm-center">
                    <a href="{{ setting()->facebook ?? '' }}" class="me-3">
                        <i class="fa-brands fa-square-facebook"></i>
                    </a>
                    <a href="{{ setting()->instagram ?? '' }}" class="me-3">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="{{ setting()->linkedin ?? '' }}" class="me-3">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a href="{{ setting()->youtube ?? '' }}">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
