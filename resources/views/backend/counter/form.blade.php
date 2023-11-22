@extends('backend.layout.master')
@section('content')

    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Counter</h4>
                    <h6>Detail for Counter</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('counter.page.index') }}">View List</a>
                </div>
            </div>
        </div>
    </div>
    {{-- @dd($collection['find_all']->id) --}}

    <div class="card">
        <div class="card-body">
            @if (isset($collection['find_all']))
                <form action="{{ route('counter.page.update', $collection['find_all']->id) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('counter.page.store') }}" method="POST">
            @endif

            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Counter Number</label>
                        <input type="number" name="counter1" class="form-control"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->counter1 : old('counter1') }}">
                        <span class="text-danger">
                            @error('counter1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Counter title 1</label>
                        <input type="text" name="counterTitle1" class="form-control"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->counterTitle1 : old('counterTitle1') }}">
                        <span class="text-danger">
                            @error('counterTitle1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Counter Number 1</label>
                        <input type="number" name="counter2" class="form-control"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->counterTitle1 : old('counterTitle1') }}">
                        <span class="text-danger">
                            @error('counterTitle1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Counter title 1</label>
                        <input type="text" name="counterTitle2" class="form-control"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->counter2 : old('counter2') }}">
                        <span class="text-danger">
                            @error('counter2')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Counter Number 2</label>
                        <input type="number" name="counter3" class="form-control"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->counterTitle2 : old('counterTitle2') }}">
                        <span class="text-danger">
                            @error('counterTitle2')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Counter title 2</label>
                        <input type="text" name="counterTitle3" class="form-control"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->counter3 : old('counter3') }}">
                        <span class="text-danger">
                            @error('counter3')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Counter Number 3</label>
                        <input type="number" name="counter4" class="form-control"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->counterTitle3 : old('counterTitle3') }}">
                        <span class="text-danger">
                            @error('counterTitle3')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Counter title 3</label>
                        <input type="text" name="counterTitle4" class="form-control"
                            value="{{ isset($collection['find_all']) ? $collection['find_all']->counterTitle3 : old('counterTitle3') }}">
                        <span class="text-danger">
                            @error('counterTitle3')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-12">
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
