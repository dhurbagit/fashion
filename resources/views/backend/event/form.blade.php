@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Upcoming Events</h4>
                    <h6>Detail for Event</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('event.page') }}">View List</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if(isset($collection['find_all']))
            <form action="{{ route('event.update', $collection['find_all']->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
                @else
            <form action="{{ route('event.save') }}" method="POST" enctype="multipart/form-data">
            @endif

                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{isset($collection['find_all'])? $collection['find_all']->title : old('title')}}">
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
                            <input type="date" name="date" value="{{isset($collection['find_all'])? $collection['find_all']->date : date('Y-m-d')}}" class="form-control">
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
                                    @isset($collection['find_all'])
                                    src="{{asset('uploads/' . $collection['find_all']->image)}}"
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
                            <textarea name="editor" id="" cols="30" rows="10">
                                {{isset($collection['find_all'])? $collection['find_all']->editor : old('editor')}}
                            </textarea>
                            <span class="text-danger">
                                @error('editor')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @if(isset($collection['find_all']))
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
