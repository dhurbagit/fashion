<header id="section__header" class="sticky">
    <div class="top__navBar">
        <div class="container">
            <div class="top__content d-flex justify-content-between flex-wrap align-items-center">
                <div class="top__left-content d-flex flex-wrap py-1">
                    <span class="me-3">
                        <a href="tel: 9849336410">
                            <i class="fa-solid fa-phone"></i>
                            {{ setting()->phone1 ?? '' }}
                        </a>
                    </span>
                    <span class="nav_envelope">
                        <a href="mailto: name@domain.com">
                            <i class="fa-solid fa-envelope"></i>
                            {{ setting()->email ?? '' }}
                        </a>
                    </span>
                </div>
                <div class="top__right__content d-flex justify-content-end align-items-center py-1">
                    <a href=" {{ setting()->facebook ?? '' }}" target="_blank">
                        <i class="fa-brands fa-square-facebook"></i>
                    </a>
                    <a href=" {{ setting()->instagram ?? '' }}" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href=" {{ setting()->linkedin ?? '' }}" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a href=" {{ setting()->youtube ?? '' }}" target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============= COMPONENT ============== -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light py-0">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                @if (!empty(setting()->image))
                    <img src="{{ asset('uploads/' . setting()->image) }}" alt="">
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ms-auto">

                    @foreach ($menus as $mainMenu)
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

                    <li class="nav-item">
                        <a href="{{ route('online_form.page.index') }}" class="btn btn-gradient">Apply Now</a>
                    </li>
                </ul>
            </div> <!-- navbar-collapse.// -->
        </div> <!-- container-fluid.// -->
    </nav>
    <!-- ============= COMPONENT END// ============== -->
</header>
