@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Setting</h4>
                    <h6>Detail for Setting</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="nav d-flex nav-pills nav-pills-custom" id="nav_wrapper">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true"><i class="fa fa-sitemap" data-bs-toggle="tooltip" title=""
                            data-bs-original-title="fa fa-sitemap" aria-label="fa fa-sitemap"></i>&nbsp; Social
                        Links</button>
                    <button class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false"><i class="fa fa-rocket" data-bs-toggle="tooltip" title=""
                            data-bs-original-title="fa fa-rocket" aria-label="fa fa-rocket"
                            aria-describedby="tooltip804962"></i>&nbsp; Contact Info</button>
                    <button class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fa fa-th-large" data-bs-toggle="tooltip" title=""
                            data-bs-original-title="fa fa-th-large" aria-label="fa fa-th-large"
                            aria-describedby="tooltip194155"></i>&nbsp; Other</button>
                </div>
                <div>
                    @if (isset($collection['setting']))
                        <form action="{{ route('setting.page.update', $collection['setting']->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                        @else
                            <form action="{{ route('setting.page.store') }}" method="POST" enctype="multipart/form-data">
                    @endif

                    @csrf
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Facebook Link</label>
                                        <input type="text" name="facebook"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->facebook : old('facebook') }}">
                                        <span class="text-danger">
                                            @error('facebook')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Instagram Link</label>
                                        <input type="text" name="instagram"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->instagram : old('instagram') }}">
                                        <span class="text-danger">
                                            @error('instagram')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">linked In Link</label>
                                        <input type="text" name="linkedin"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->linkedin : old('linkedin') }}">
                                        <span class="text-danger">
                                            @error('linkedin')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Youtube Link</label>
                                        <input type="text" name="youtube"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->youtube : old('youtube') }}">
                                        <span class="text-danger">
                                            @error('youtube')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->email : old('email') }}">
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Phone 1</label>
                                        <input type="text" name="phone"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->phone : old('phone') }}">
                                        <span class="text-danger">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Phone 2</label>
                                        <input type="text" name="phone1"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->phone1 : old('phone1') }}">
                                        <span class="text-danger">
                                            @error('phone1')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="address"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->address : old('address') }}">
                                        <span class="text-danger">
                                            @error('address')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Quote</label>
                                        <textarea name="quote" id="" cols="30" rows="10">
                                            {{ isset($collection['setting']) ? $collection['setting']->quote : old('quote') }}
                                        </textarea>
                                        <span class="text-danger">
                                            @error('quote')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Security Key</label>
                                        <input type="text" name="security_key"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->security_key : old('security_key') }}">
                                        <span class="text-danger">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Site Key</label>
                                        <input type="text" name="site_key"
                                            value="{{ isset($collection['setting']) ? $collection['setting']->site_key : old('site_key') }}">
                                        <span class="text-danger">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><b>Logo</b></label>
                                        <div class="d-flex">
                                            <div class="input_image">
                                                <img id="placeholder_image"
                                                    @isset($collection['setting'])
                                                            src="{{ asset('uploads/' . $collection['setting']->image) }}"
                                                            @endisset
                                                    alt="">
                                            </div>
                                            <input onchange="loadFile(event)" name="image" type="file"
                                                class="form-control">
                                        </div>
                                        <span class="text-danger">
                                            @error('image')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><b>Image</b></label>
                                        <div class="d-flex">
                                            <div class="input_image">
                                                <img id="placeholder_image1"
                                                    @isset($collection['setting'])
                                                            src="{{ asset('uploads/' . $collection['setting']->image1) }}"
                                                            @endisset
                                                    alt="">
                                            </div>
                                            <input onchange="loadFile1(event)" name="image1" type="file"
                                                class="form-control">
                                        </div>
                                        <span class="text-danger">
                                            @error('image1')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Google Map</label>
                                        <textarea class="form-control" name="google_map" id="" cols="20" rows="10">
                                            {{ isset($collection['setting']) ? $collection['setting']->google_map : old('google_map') }}
                                        </textarea>
                                        <span class="text-danger">
                                            @error('google_map')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($collection['setting']))
                        <button type="submit" class="btn btn-success mt-5">Update</button>
                    @else
                        <button type="submit" class="btn btn-success mt-5">Save</button>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@push('scripts')
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('placeholder_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile1 = function(event) {
            var image = document.getElementById('placeholder_image1');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
