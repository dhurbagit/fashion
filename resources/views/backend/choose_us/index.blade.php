@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Why choose Us</h4>
            <h6>Detail for Choose Us</h6>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (isset($chooseUs_list))
                <form action="{{ route('chooseUs.update', $chooseUs_list->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="{{ route('chooseUs.save') }}" method="POST" enctype="multipart/form-data">
            @endif

            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title"
                            value="{{ isset($chooseUs_list) ? $chooseUs_list->title : old('title') }}">
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="d-flex">
                            <div class="input_image">
                                <img @isset($chooseUs_list)
                                    src="{{ asset('uploads/' . $chooseUs_list->image) }}"
                                    @endisset
                                    alt="" id="placeholder_image">
                            </div>
                            <input onchange="loadFile(event)" type="file" class="form-control" name="image">
                        </div>
                        <span class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Counter Number One</label>
                        <input type="number" name="counter_one"
                            value="{{ isset($chooseUs_list) ? $chooseUs_list->counter_one : old('counter_one') }}"
                            class="form-control">
                        <span class="text-danger">
                            @error('counter_one')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Counter Caption One</label>
                        <input type="text" name="counter_caption_one"
                            value="{{ isset($chooseUs_list) ? $chooseUs_list->counter_caption_one : old('counter_caption_one') }}">
                        <span class="text-danger">
                            @error('counter_caption_one')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Counter Number Two</label>
                        <input type="number" name="counter_two"
                            value="{{ isset($chooseUs_list) ? $chooseUs_list->counter_two : old('counter_two') }}"
                            class="form-control">
                        <span class="text-danger">
                            @error('counter_two')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Counter Caption Two</label>
                        <input type="text" name="counter_caption_two"
                            value="{{ isset($chooseUs_list) ? $chooseUs_list->counter_caption_two : old('counter_caption_two') }}">
                        <span class="text-danger">
                            @error('counter_caption_two')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description1" id="" cols="30" rows="10">
                            {{ isset($chooseUs_list) ? $chooseUs_list->description : old('description1') }}
                        </textarea>
                        <span class="text-danger">
                            @error('description1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-12">
                    @if (isset($chooseUs_list))
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
@endpush
