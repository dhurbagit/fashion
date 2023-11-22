<div class="header">

    <!-- Logo -->
    <div class="header-left active">
        <a href="{{url('/')}}" class="logo custom_logo_wrapper">
            @if (!empty(setting()->image))
            <img src="{{ asset('uploads/' . setting()->image ?? '' ) }}" alt="">
            @endif

        </a>

    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu" id="top_custom_navigation">
        <li><a class="dropdown-item" href="{{ route('setting.page.index') }}"><i class="fe fe-settings"
                    data-bs-toggle="tooltip" title="" data-bs-original-title="fe fe-settings"
                    aria-label="fe fe-settings"></i>Settings</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <i class="fe fe-user-x" data-bs-toggle="tooltip" title=""
                        data-bs-original-title="fe fe-user-x" aria-label="fe fe-user-x"></i>
                    Logout
                </button>
            </form>
            </a>
        </li>
    </ul>
    <!-- /Header Menu -->


    <!-- /Mobile Menu -->
</div>
