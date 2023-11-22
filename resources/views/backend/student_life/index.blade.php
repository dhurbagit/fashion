@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Student Life</h4>
                    <h6>Detail for Student life</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('studentLife.create') }}">Create New</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-wrapper">
                <b>Section Heading and Background</b>
                @if (isset($section_detail))
                    <form action="{{ route('studentLife.sectinDetail.update', $section_detail->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('studentLife.sectinDetail.save') }}" method="POST"
                            enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Heading</label>
                            <input type="text" name="section_title"
                                value="{{ isset($section_detail) ? $section_detail->section_title : old('section_title') }}">
                            <span class="text-danger">
                                @error('section_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Background Image</label>
                            <div class="d-flex">
                                <div class="input_image">
                                    <img @isset($section_detail)
                                    src="{{ asset('uploads/' . $section_detail->bg_image) }}"
                                    @endisset
                                        alt="" id="placeholder_image">
                                </div>
                                <input onchange="loadFile(event)" type="file" class="form-control" name="bg_image">
                            </div>
                            <span class="text-danger">
                                @error('bg_image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @if (isset($section_detail))
                            <button type="submit" class="btn btn-success">Update</button>
                        @else
                            <button type="submit" class="btn btn-success">Save</button>
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
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentLife_list as $detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img width="32px" height="32px"
                                                src="{{ asset('uploads/' . $detail->image) }}" alt=""></td>
                                        <td>{{ Carbon\Carbon::parse($detail->date)->format('y-M-d') }}</td>

                                        <td>
                                            <div class="form-check form-switch">
                                                <input data-id="{{ $detail->id }}"
                                                    class="drag_button form-check-input status_action" type="checkbox"
                                                    role="switch" name="status"
                                                    id="flexSwitchCheckChecked_{{ $detail->id }}"
                                                    @if ($detail->status == 1) checked @endif>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="me-3" href="{{ route('studentLife.edit', $detail->id) }}">
                                                <img src="{{ asset('backend/assets/img/icons/edit.svg') }}" alt="img">
                                            </a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop_{{ $detail->id }}">
                                                <img src="{{ asset('backend/assets/img/icons/delete.svg') }}"
                                                    alt="img">
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade cs_modal" id="staticBackdrop_{{ $detail->id }}"
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
                                                            <form action="{{ route('studentLife.delete', $detail->id) }}"
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
                url: "{{ route('studentLife.status') }}",
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
