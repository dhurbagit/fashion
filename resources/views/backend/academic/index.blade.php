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
                    <a class="btn btn-primary" href="{{ route('academic.page.create') }}">Create New</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            @if (isset($collection['academic_section']))
                <form action="{{ route('academic.section.update', $collection['academic_section']->id) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('academic.section.save') }}" method="POST">
            @endif

            @csrf
            <div class="form-wrapper">
                <div class="form-group">
                    <label for="">Section heading</label>
                    <input type="text" name="section_heading"
                        value="{{ isset($collection['academic_section']) ? $collection['academic_section']->section_heading : old('section_heading') }}">
                    <span class="text-danger">
                        @error('section_heading')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">Section Sub Title</label>
                    <input type="text" name="section_subCaption"
                        value="{{ isset($collection['academic_section']) ? $collection['academic_section']->section_subCaption : old('section_subCaption') }}">
                    <span class="text-danger">
                        @error('section_subCaption')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    @if (isset($collection['academic_section']))
                        <button class="btn btn-success" type="submit">Update</button>
                    @else
                        <button class="btn btn-success" type="submit">Save</button>
                    @endif

                </div>
            </div>

            </form>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Image</td>
                                <td>Heading</td>
                                <td>Heading 1</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection['academic_list'] as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img data-classname="image_group" src="{{asset('uploads/' . $data->image )}}" alt=""></td>
                                    <td>{{$data->heading1}}</td>
                                    <td>{{$data->heading2}}</td>
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
                                        <a class="me-3" href="{{ route('academic.page.edit', $data->id) }}">
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
                                                        <form action="{{ route('academic.page.destroy', $data->id) }}"
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


@stop

@push('scripts')
    <script>
        $('.status_action').change(function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "post",
                url: "{{ route('academic.status') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                },
                success: function(res) {
                    toastr.success(res);
                }
            });
        });
    </script>
@endpush
