@extends('backend.layout.master')

@section('content')

<div class="page-header">
    <div class="page-title w-100">
        <div class="d-flex justify-content-between">
            <div class="title-left">
                <h4>Setting</h4>
                <h6>Detail for Setting</h6>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table  datanew ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contactList as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->contact}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->message}}</td>
                                <td>
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
                                                <form action="{{ route('ContactUs.page.destroy', $data->id) }}"
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





@stop

