@extends('frontend.layout.master')

@section('content')

    <div id="form__container">
        <div class="container">
            <div class="white-box mb-5">
                <div class="form-title text-center pt-5 pb-4">
                    <div class="wow fadeInDown" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        <h1>NATIONAL INSTITUTE OF ART & FASHION TECHNOLOGY</h1>
                        <p>Kupandole, Lalitpur, Nepal | Phone: +977-98456123789, 01-5555555</p>
                        <p class="mb-5">Email: info@niaft.edu.np</p>

                        <h2>STUDENT APPLICATION FORM</h2>
                    </div>
                </div>
                <div class="form__input-box">
                    <form action="{{ route('onlineForm.store') }}" method="POST" class=" wow fadeInUp" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        @csrf
                        <h4>PERSONAL DETAILS</h4>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name of the Applicant (Full
                                Name):</label>
                            <input type="text" class="form-control" id="name" name="fullname">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Current address:</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="home" class="form-label">Permanent home
                                        address:</label>
                                    <input type="text" class="form-control" id="home" name="homeAddress">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="contatc" class="form-label">Contact Number:</label>
                                    <input type="text" class="form-control" id="contatc" name="phone">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile Number:</label>
                                    <input type="text" class="form-control" id="mobile" name="mobileNumber">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="d-flex flex-wrap">
                                    <label class="form-label">Gender:</label>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input" type="radio" name="gender" value="male"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input" type="radio" name="gender" value="female"
                                            id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nationality" class="form-label">Nationality:</label>
                                    <input type="text" class="form-control" id="nationality" name="nationality">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Date of Birth(AD):</label>
                                                <input type="date" class="form-control" id="exampleFormControlInput1"> -->
                                    <label for="date" class="form-label">Date of Birth(AD):</label>
                                    <div class="input-group date" id="datepicker">
                                        <input type="text" class="form-control" id="date" value="{{date('Y-m-d')}}"
                                            name="dob_ad" />
                                        <span class="input-group-append">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date of Birth(BS):</label>
                                    <input type="text" id="nepali-datepicker" class="form-control" name="dob_bs" value="{{date('Y-m-d')}}"
                                         />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Age:</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="age">
                                </div>
                            </div>
                        </div>
                        <h4>SELECT PROGRAM:</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name="program">
                                    <option selected>Select the program</option>
                                    <option value="1">Basic Course</option>
                                    <option value="2">Diploma In Fashion Technology</option>
                                    <option value="3">Certificate In Fashion Technology</option>
                                </select>
                            </div>
                        </div>
                        <h4>ACADEMIC RECORD:</h4>
                        <div class="mb-3">
                            <label for="attend" class="form-label">Name of school/college attended:</label>
                            <input type="text" class="form-control" id="attend" name="attended">
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Highest level passed:</label>
                            <input type="text" class="form-control" id="level" name="levelPassed">
                        </div>
                        <div class="mb-3">
                            <label for="traning" class="form-label">1. Have you ever had a similar traning before? If
                                Yes where?:</label>
                            <input type="text" class="form-control" id="traning" name="training">
                        </div>
                        <div class="mb-3">
                            <label for="attend" class="form-label">2. How did you FIRST learn about NIAFT?</label>
                            <input type="text" class="form-control" id="attend" name="about">
                        </div>
                        <div class="mb-3">
                            <label for="encourage" class="form-label">3. Who encouraged you to apply to NIAFT?</label>
                            <input type="text" class="form-control" id="encourage" name="encouraged">
                        </div>
                        <div class="g-recaptcha" data-sitekey={{ setting()->site_key ?? '' }}>
                        </div>
                        <br>
                        @if (Session::has('g-recaptcha-response'))
                            <span class="text-danger">{{ Session::get('g-recaptcha-response') }}</span>
                        @endif
                        <div class="text-center">
                            <button class="btn btn-gradient" type="submit">Submit Form</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@stop
