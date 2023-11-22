@extends('backend.layout.master')
@section('content')

    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Student Life</h4>
                    <h6>Detail for Student Life</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('studentLife.page') }}">View List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (isset($edit_list))
                <form action="{{ route('studentLife.update', $edit_list->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="{{ route('studentLife.save') }}" method="POST" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title"
                            value="{{ isset($edit_list) ? $edit_list->title : old('title') }}">
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" class="form-control" name="date"
                            value="{{ isset($edit_list) ? $edit_list->date : date('Y-m-d') }}">
                        <span class="text-danger">
                            @error('date')
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
                                    @isset($edit_list)
                                src="{{ asset('uploads/' . $edit_list->image) }}"
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
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description1" id="" cols="30" rows="10">
                            {{ isset($edit_list) ? $edit_list->description : old('description1') }}
                        </textarea>
                        <span class="text-danger">
                            @error('description1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-12">
                    @if (isset($edit_list))
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
