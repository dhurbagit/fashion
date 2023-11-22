@extends('backend.layout.master')
@section('content')


    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Our Team</h4>
                    <h6>Detail for Our Team</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('team.page.create') }}">Create New</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-wrapper">
                @if (isset($collection['team_section']))
                    <form action="{{ route('team.section.update', $collection['team_section']->id) }}" method="POST">
                        @method('put')
                    @else
                        <form action="{{ route('team.section.save') }}" method="POST">
                @endif

                @csrf
                <div class="form-group">
                    <label for="">Section Heading</label>
                    <input type="text" name="section_title" value="{{isset($collection['team_section']) ? $collection['team_section']->section_title : old('section_title')}}">
                    <span class="text-danger">
                        @error('section_title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">Section Sup Caption</label>
                    <input type="text" name="section_title_caption" value="{{isset($collection['team_section']) ? $collection['team_section']->section_title_caption : old('section_title_caption')}}">
                    <span class="text-danger">
                        @error('section_title_caption')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @if (isset($collection['team_section']))
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
                    <table class="table  datanew ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection['events_tblList'] as $data)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>
                                        <img data-classname="image_group"
                                            @isset($data->image)
                                            src="{{ asset('uploads/' . $data->image) }}"
                                            @endisset
                                            alt="">
                                    </th>
                                    <th>
                                        {{ Str::limit($data->name, 12, '') }}
                                    </th>
                                    <th>
                                        {{ Str::limit($data->designation, 12, '') }}
                                    </th>
                                    <th>
                                        <div class="form-check form-switch">
                                            <input data-id="{{ $data->id }}"
                                                class="drag_button form-check-input status_action" type="checkbox"
                                                role="switch" name="status"
                                                id="flexSwitchCheckChecked_{{ $data->id }}"
                                                @if ($data->status == 1) checked @endif>
                                        </div>
                                    </th>
                                    <th>
                                        <a class="me-3" href="{{ route('team.page.edit', $data->id) }}">
                                            <img src="{{ asset('backend/assets/img/icons/edit.svg') }}" alt="img">
                                        </a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop_{{ $data->id }}">
                                            <img src="{{ asset('backend/assets/img/icons/delete.svg') }}" alt="img">
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
                                                        <form action="{{ route('team.page.destroy', $data->id) }}"
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
                                    </th>
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
                url: "{{ route('team1.status') }}",
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
