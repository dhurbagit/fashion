@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Academic</h4>
                    <h6>Detail for Academic</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('academic.page.index') }}">View List</a>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            @if (isset($collection['find_all']))
                <form action="{{ route('academic.page.update', $collection['find_all']->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="{{ route('academic.page.store') }}" method="POST" enctype="multipart/form-data">
            @endif

            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Heading 1</label>
                        <input type="text" name="heading1"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->heading1 : old('heading1') }}">
                        <span class="text-danger">
                            @error('heading1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Heading 2</label>
                        <input type="text" name="heading2"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->heading2 : old('heading2') }}">
                        <span class="text-danger">
                            @error('heading2')
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
                                    src="{{asset('uploads/' . $collection['find_all']->image )}}"
                                @endisset
                                alt="">
                            </div>
                            <input onchange="loadFile(event)" name="image" type="file" class="form-control">
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
                        <label for="">Description 1 for heading 1</label>
                        <textarea name="editor" id="" cols="30" rows="10">
                                {{ isset($collection['find_all']) ? $collection['find_all']->editor : old('editor') }}
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
                        <label for="">Description 2 for heading 2</label>
                        <textarea name="description1" id="" cols="30" rows="10">
                                {{ isset($collection['find_all']) ? $collection['find_all']->description1 : old('description1') }}
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
@endpush
