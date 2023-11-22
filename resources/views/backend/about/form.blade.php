@extends('backend.layout.master')
@section('content')

    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>About Us</h4>
                    <h6>Detail for About Us</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('aboutUs.page.index') }}">Create New</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if (isset($collection['find_all']))
                <form action="{{ route('aboutUs.page.update', $collection['find_all']->id ) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="{{ route('aboutUs.page.store') }}" method="POST" enctype="multipart/form-data">
            @endif

            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Top Heading</label>
                        <input type="text" name="heading_one" value="{{isset($collection['find_all'])?$collection['find_all']->heading_one : old('heading_one') }}">
                        <span class="text-danger">
                            @error('heading_one')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Bottom Heading</label>
                        <input type="text" name="heading_two" value="{{isset($collection['find_all'])?$collection['find_all']->heading_two : old('heading_two') }}">
                        <span class="text-danger">
                            @error('heading_two')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Sub Heading</label>
                        <input type="text" name="sub_heading" value="{{isset($collection['find_all'])?$collection['find_all']->sub_heading : old('sub_heading') }}">
                        <span class="text-danger">
                            @error('sub_heading')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for=""><b>Image</b></label>
                        <div class="d-flex">
                            <div class="input_image">
                                <img id="placeholder_image"
                                @isset($collection['find_all'])
                                    src="{{asset('uploads/'. $collection['find_all']->image1)}}"
                                @endisset
                                alt="">
                            </div>
                            <input onchange="loadFile(event)" name="image1" type="file" class="form-control">
                        </div>
                        <span class="text-danger">
                            @error('image1')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for=""><b>Image</b></label>
                        <div class="d-flex">
                            <div class="input_image">
                                <img id="placeholder_image1"
                                @isset($collection['find_all'])
                                src="{{asset('uploads/'. $collection['find_all']->image2)}}"
                            @endisset
                            alt="">
                            </div>
                            <input onchange="loadFile1(event)" name="image2" type="file" class="form-control">
                        </div>
                        <span class="text-danger">
                            @error('image2')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for=""><b>Image</b></label>
                        <div class="d-flex">
                            <div class="input_image">
                                <img id="placeholder_image2"
                                @isset($collection['find_all'])
                                src="{{asset('uploads/'. $collection['find_all']->image3)}}"
                            @endisset
                             alt="">
                            </div>
                            <input onchange="loadFile2(event)" name="image3" type="file" class="form-control">
                        </div>
                        <span class="text-danger">
                            @error('image3')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Top Description</label>
                        <textarea name="editor" id="" cols="30" rows="10">
                            {{isset($collection['find_all'])?$collection['find_all']->editor : old('editor') }}
                        </textarea>
                        <span class="text-danger">
                            @error('editor')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Bottom Description</label>
                        <textarea name="description1" id="" cols="30" rows="10">
                            {{isset($collection['find_all'])?$collection['find_all']->description1 : old('description1') }}
                        </textarea>
                        <span class="text-danger">
                            @error('description1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-12">
                    @if (isset($collection['find_all']))
                        <button type="submit" class="btn btn-success">Update</button>
                    @else
                        <button type="submit" class="btn btn-success">Save</button>
                    @endif

                </div>
            </div>
            </form>
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
    <script>
        var loadFile2 = function(event) {
            var image = document.getElementById('placeholder_image2');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
