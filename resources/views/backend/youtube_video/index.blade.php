@extends('backend.layout.master')
@section('content')

    <div class="page-header">
        <div class="page-title">
            <h4>Youtube</h4>
            <h6>Detail for Youtube</h6>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-wrapper">
                @if(isset($edit_collection))
                <form action="{{ route('youtube.update', $edit_collection->id) }}" method="POST">
                    @method('put')
                @else
                <form action="{{ route('youtube.save') }}" method="POST">
                @endif

                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{isset($edit_collection)? $edit_collection->title : old('title')}}">
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">Youtube Link</label>
                        <input type="text" name="link" value="{{isset($edit_collection)? $edit_collection->link : old('link')}}">
                        <span class="text-danger">
                            @error('link')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    @if(isset($edit_collection))
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

                    <div class="table-responsive">
                        <table class="table  datanew ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detail->title }}</td>
                                        <td>
                                            <a href="{{ $detail->link }}">
                                                <i class="fa fa-anchor" data-bs-toggle="tooltip" title=""
                                                    data-bs-original-title="Link" aria-label="fa fa-anchor"></i>
                                            </a>
                                        </td>
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
                                            <a class="me-3" href="{{ route('youtube.edit', $detail->id) }}">
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
                                                            <form action="{{ route('youtube.delete', $detail->id) }}"
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
    $('.status_action').change(function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type: "post",
            url: "{{ route('youtube.status') }}",
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
