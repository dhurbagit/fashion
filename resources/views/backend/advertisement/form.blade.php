@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Advertisement</h4>
                    <h6>Detail for Advertisement</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('advertisement.page') }}">View List</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if (isset($collection_update))
                <form action="{{ route('advertisement.update', $collection_update->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="{{ route('advertisement.save') }}" method="POST" enctype="multipart/form-data">
            @endif

            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Sub Title</label>
                        <input type="text" name="sub_title"
                            value="{{ isset($collection_update) ? $collection_update->sub_title : old('sub_title') }}">
                        <span class="text-danger">
                            @error('sub_title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Heading</label>
                        <input type="text" name="heading"
                            value="{{ isset($collection_update) ? $collection_update->heading : old('heading') }}">
                        <span class="text-danger">
                            @error('heading')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Background Image</label>
                        <div class="d-flex">
                            <div class="input_image">
                                <img @isset($collection_update)
                                            src="{{ asset('uploads/' . $collection_update->image) }}"
                                        @endisset
                                    alt="" id="placeholder_image">
                            </div>
                            <input onchange="loadFile(event)" type="file" name="image" class="form-control">
                        </div>
                        <span class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description1" id="" cols="30" rows="10" class="form-control">
                            {{ isset($collection_update) ? $collection_update->description : old('description1') }}
                        </textarea>
                        <span class="text-danger">
                            @error('description1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <br>
                    <br>
                    @if (isset($collection_update))
                        <button type="submit" class="btn btn-success">update</button>
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
