@extends('backend.layout.master')
@section('content')


    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Our Teams</h4>
                    <h6>Detail for Our Teams</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('team.page.index') }}">List view</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if (isset($collection['find_all']))
                <form action="{{ route('team.page.update', $collection['find_all']->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="{{ route('team.page.store') }}" method="POST" enctype="multipart/form-data">
            @endif

            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->name : old('name') }}">
                        <span class="text-danger">
                            @error('name')
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
                                    src="{{ asset('uploads/' . $collection['find_all']->image) }}"
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
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Designation</label>
                        <input type="text" name="designation"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->designation : old('designation') }}">
                        <span class="text-danger">
                            @error('designation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Facebook link</label>
                        <input type="text" name="facbook_link"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->facbook_link : old('facbook_link') }}">
                        <span class="text-danger">
                            @error('facbook_link')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Instagram link</label>
                        <input type="text" name="instagram_link"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->instagram_link : old('instagram_link') }}">
                        <span class="text-danger">
                            @error('instagram_link')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Linked Link</label>
                        <input type="text" name="linked_link"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->linked_link : old('linked_link') }}">
                        <span class="text-danger">
                            @error('linked_link')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-12">
                    @if (isset($collection['find_all']))
                        <button class="btn btn-success" type="submit">Update</button>
                    @else
                        <button class="btn btn-success" type="submit">Save</button>
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
