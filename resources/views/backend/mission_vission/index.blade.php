@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Mission Vission and Other</h4>
            <h6>Detail for Mission Vission and Other</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-wrapper">
                @if (isset($collection['find_all']))
                    <form action="{{ route('missionV.page.update', $collection['find_all']->id) }}" method="POST">
                    @method('put')
                        @else
                        <form action="{{ route('missionV.page.store') }}" method="POST">
                @endif
                @csrf
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
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="editor" id="" cols="30" rows="10">
                            {{ isset($collection['find_all']) ? $collection['find_all']->editor : old('editor') }}
                        </textarea>
                    <span class="text-danger">
                        @error('editor')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @if (isset($collection['find_all']))
                    <button type="submit" class="btn btn-success">Update</button>
                @else
                    <button type="submit" class="btn btn-success">Save</button>
                @endif

                </form>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table  datanew ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection['all'] as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ strip_tags(Str::limit($data->editor, 30, '...')) }}</td>
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
                                        <a class="me-3" href="{{ route('missionV.page.edit', $data->id) }}">
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
                                                        <form action="{{ route('missionV.page.destroy', $data->id) }}"
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
                url: "{{ route('missionV.status') }}",
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
