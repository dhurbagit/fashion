@extends('backend.layout.master')
@section('content')

    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>About Us</h4>
                    <h6>Detail for About Us</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('counter.page.create') }}">Create New</a>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table datanew collection_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Counter</th>
                                <th>Counter No</th>
                                <th>Counter 1</th>
                                <th>Counter No 1</th>
                                <th>Counter 2</th>
                                <th>Counter No 2</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection['all'] as $data)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{Str::limit($data->counter1, '10' ,'...')}}</td>
                                <td>{{$data->counterTitle1}}</td>
                                <td>{{Str::limit($data->counter2, '10' ,'...')}}</td>
                                <td>{{$data->counterTitle2}}</td>
                                <td>{{Str::limit($data->counter3, '10' ,'...')}}</td>
                                <td>{{$data->counterTitle3}}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input data-id="{{ $data->id }}" class="drag_button form-check-input status_action"
                                            type="checkbox" role="switch" name="status"
                                            id="flexSwitchCheckChecked_{{ $data->id }}"
                                            @if ($data->status == 1) checked @endif>
                                    </div>
                                </td>
                                <td>
                                    <a class="me-3" href="{{ route('counter.page.edit', $data->id) }}">
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
                                                    <form action="{{ route('counter.page.destroy', $data->id) }}"
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
                url: "{{ route('counter.status') }}",
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
