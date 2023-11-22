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
                    <a class="btn btn-primary" href="{{route('create.ads')}}">Create New</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-wrapper">
                <b>Section Backgound Image</b>
                @if (isset($ads_list))
                    <form action="{{ route('advertisement.bg.update', $ads_list->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('advertisement.bg.save') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="form-group">

                    <label for="">Background Image</label>
                    <div class="d-flex">
                        <div class="input_image">
                            <img @isset($ads_list)
                                    src="{{ asset('uploads/' . $ads_list->bg_image) }}"
                                @endisset
                                alt="" id="bg_placeholder_image">
                        </div>
                        <input onchange="bg_loadFile(event)" type="file" name="bg_image" class="form-control">
                    </div>
                    <span class="text-danger">
                        @error('bg_image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @if (isset($ads_list))
                    <button type="submit" class="btn btn-success">Update</button>
                @else
                    <button type="submit" class="btn btn-success">Save</button>
                @endif
                </form>

            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive1">
                        <table class="table  datanew ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Sub Title</th>
                                    <th>Heading</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ads_collection as $data)


                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img width="32px" height="32px" src="{{asset('uploads/' . $data->image)}}" alt=""></td>
                                    <td>{{$data->sub_title}}</td>
                                    <td>{{$data->heading}}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input data-id="{{ $data->id }}" class="drag_button form-check-input status_action"
                                                type="checkbox" role="switch" name="status"
                                                id="flexSwitchCheckChecked_{{ $data->id }}"
                                                @if ($data->status == 1) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="me-3" href="{{ route('advertisement.edit', $data->id) }}">
                                            <img src="{{ asset('backend/assets/img/icons/edit.svg') }}" alt="img">
                                        </a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop_{{ $data->id }}">
                                            <img src="{{ asset('backend/assets/img/icons/delete.svg') }}"
                                                alt="img">
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade cs_modal" id="staticBackdrop_{{ $data->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Are You
                                                            Sure ?</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"><i class="fa fa-times"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Close Modal"
                                                                aria-label="fa fa-times"></i></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        You won't be able to revert this!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('advertisement.delete', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Yes</button>
                                                            <button type="button"  data-bs-dismiss="modal" class="btn btn-primary">No</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@push('scripts')

    <script>
        var bg_loadFile = function(event) {
            var image = document.getElementById('bg_placeholder_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

     <script>
        $('.status_action').change(function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "post",
                url: "{{ route('advertisement.status') }}",
                data: {
                    _token: "{{csrf_token()}}",
                    id: id,
            },
                success:function(res){
                    toastr.success(res);
                }
            });
        });
    </script>
@endpush
