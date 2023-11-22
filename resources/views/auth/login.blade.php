@extends('frontend.layout.master')
@section('content')
    <section id="login__container" style="background-image: url('{{asset('frontend/assets/Images/login.png')}}')">
        <div class="login__content-wrapper">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-signin-tab" data-bs-toggle="pill" data-bs-target="#pills-signin"
                        type="button" role="tab" aria-controls="pills-signin" aria-selected="true">SIGN IN</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-signup-tab" data-bs-toggle="pill" data-bs-target="#pills-signup"
                        type="button" role="tab" aria-controls="pills-signup" aria-selected="false">SIGN UP</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active py-5" id="pills-signin" role="tabpanel"
                    aria-labelledby="pills-signin-tab">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="email" placeholder="Username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="floatingInput" placeholder="Password">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="form-check2">
                            <input type="checkbox" id="remember">
                            <label for="remember">Keep me logged in</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sign mb-4">LOGIN</button>

                        </div>
                        <div class="text-center">
                            <a href="{{ route('password.request') }}" class="forget">Forget Password?</a>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade py-3" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
                    <form action="#">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Email">
                            <label for="floatingInput">Email ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput" placeholder="Password">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="form-check2">
                            <input type="checkbox" id="terms">
                            <label for="terms">I agree to terms and conditions</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-sign mb-4">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@stop
