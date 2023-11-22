@extends('backend.layout.master')
@section('content')

    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Album</h4>
                    <h6>Detail for Album</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('album.page.index') }}">Create New</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (isset($collection['find_all']))
                <form action="{{ route('album.page.update', $collection['find_all']->id) }}" method="POST" enctype="multipart/form-data">
                     @method('put')
                    @else
                    <form action="{{ route('album.page.store') }}" method="POST" enctype="multipart/form-data">
            @endif

            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->title : old('title') }}">
                        <span class="text-danger">
                            @error('title')
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

                @isset($collection['find_all'])


                    <div class="col-lg-12">
                        <div class="gallery_wrapper">
                            <ul>
                                @foreach ($collection['find_all']->Gallery_image()->get() as $data)
                                    <li>
                                        <a data-id="{{ $data->id }}" href="javascript:void(0)" class="delete_item"><i
                                                class="fa fa-times"></i></a>

                                        <img src="{{ asset('uploads/' . $data->image) }}" alt="">
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                @endisset
                <div class="col-lg-12">
                    <div class="field" align="left">
                        <h4>Upload your images for Gallery</h4>
                        <input type="file" id="files" name="files[]" multiple class="form-control">
                        <div id="wrappper_flex">
                            <div id="holder"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <br>
                    <br>
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
        $('.delete_item').click(function() {
            var val = $(this).attr('data-id');
            var url = "{{ route('gallery.delete', ':val') }}";
            url = url.replace(':val', val);

            $.ajax({
                url: url,
                type: "delete",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(res) {
                    location.reload(true);
                    toastr.success(res);
                }
            })
        })
    </script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('placeholder_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result +
                                "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\"><i class='fa fa-times'></i></span>" +
                                "</span>").insertAfter("#holder");

                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });



                        });
                        fileReader.readAsDataURL(f);
                    }
                    console.log(files);
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script>
@endpush
