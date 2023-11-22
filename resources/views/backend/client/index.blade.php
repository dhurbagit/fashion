@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Client</h4>
            <h6>Detail for Clients</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-wrapper">
                @if (isset($client_edit))
                    <form action="{{ route('client.update', $client_edit->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('client.save') }}" method="POST" enctype="multipart/form-data">
                @endif


                @csrf

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title"
                                value="{{ isset($client_edit) ? $client_edit->title : old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" name="link"
                                value="{{ isset($client_edit) ? $client_edit->link : old('link') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <div class="d-flex">
                                <div class="input_image">
                                    <img @isset($client_edit)
                                        src="{{ asset('uploads/' . $client_edit->image) }}"
                                        @endisset
                                        alt="" id="placeholder_image">
                                </div>
                                <input onchange="loadFile(event)" type="file" name="image"
                                    class="form-control">

                            </div>
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        @if (isset($client_edit))
                            <button type="submit" class="btn btn-success">Update</button>
                        @else
                            <button type="submit" class="btn btn-success">save</button>
                        @endif

                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  datanew ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Link</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client_list as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td><img width="32px" height="32px" src="{{ asset('uploads/' . $data->image) }}"
                                                alt=""></td>
                                        <td><a href="{{ $data->link }}"><i class="fa fa-anchor" data-bs-toggle="tooltip"
                                                    title="" data-bs-original-title="Link"
                                                    aria-label="fa fa-anchor"></i></a></td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input data-id="{{ $data->id }}"
                                                    class="drag_button form-check-input status_action" type="checkbox"
                                                    role="switch" name="status"
                                                    id="flexSwitchCheckChecked_{{ $data->id }}"
                                                    @if ($data->status == 1) checked @endif>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="me-3" href="{{ route('client.edit', $data->id) }}">
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
                                                            <form action="{{ route('client.delete', $data->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Yes</button>
                                                                <button type="button" data-bs-dismiss="modal"
                                                                    class="btn btn-primary">No</button>
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
        var loadFile = function(event) {
            var image = document.getElementById('placeholder_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        $('.status_action').change(function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "post",
                url: "{{ route('client.status') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                },
                success:function(res){
                    toastr.success(res);
                }
            });
        });
    </script>
@endpush
