@extends('backend.layout.master')
@section('content')

    <div class="page-header">
        <div class="page-title w-100">
            <div class="d-flex justify-content-between">
                <div class="title-left">
                    <h4>Menu</h4>
                    <h6>Detail for Menu</h6>
                </div>
                <div class="title-button">
                    <a class="btn btn-primary" href="{{ route('menu.page.index') }}">View List</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if (isset($edit_menu))
                <form action="{{ route('menu.page.update', $edit_menu->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="{{ route('menu.page.store') }}" method="POST" enctype="multipart/form-data">
            @endif

            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Menu Name</label>
                        <input type="text" name="name"
                            value="{{ isset($edit_menu) ? $edit_menu->name : old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for=""><b>Main Image</b></label>
                        <div class="d-flex">
                            <div class="input_image">
                                <img id="placeholder_image"
                                    @isset($edit_menu)
                                src="{{ asset('uploads/' . $edit_menu->image) }}"
                                @endisset
                                    alt="">
                            </div>
                            <input onchange="loadFile(event)" name="image" type="file" class="form-control">
                        </div>
                        <span class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for=""><b>Banner Image</b></label>
                        <div class="d-flex">
                            <div class="input_image">
                                <img id="placeholder_image1"
                                    @isset($edit_menu)
                                src="{{ asset('uploads/' . $edit_menu->banner_image) }}"
                                @endisset
                                    alt="">
                            </div>
                            <input onchange="loadFile1(event)" name="banner_image" type="file" class="form-control">
                        </div>
                        <span class="text-danger">
                            @error('banner_image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Page Title</label>
                        <input type="text" name="page_title"
                            value="{{ isset($edit_menu) ? $edit_menu->page_title : old('page_title') }}">
                        <span class="text-danger">
                            @error('page_title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">External Link</label>
                        <input type="text" name="external_link"
                            value="{{ isset($edit_menu) ? $edit_menu->external_link : old('external_link') }}">
                        <span class="text-danger">
                            @error('external_link')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                {{-- @dd($menu_categories, $edit_menu->category_slug) --}}


                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Menu Category (Page Template)</label>
                        <select class="form-control js-example-basic-single select2" name="menu_category">
                            <option value="">--Select a category--</option>
                            @foreach ($menu_categories as $category)
                                <option value="{{ $category }}"  {{ isset($edit_menu) ? (($category ==  $edit_menu->category_slug) ? 'selected' : '') : '' }}>
                                     {{ ucwords($category) }}
                                </option>
                            @endforeach 
                        </select>
                        <span class="text-danger">
                            @error('menu_category')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- @dd($edit_menu->main_child == 0,  $edit_menu->main_child)) --}}
                    <div class="form-group">
                        <label for="">Menu or Child Menu</label>
                        <select name="main_child" id=""
                            class="main_child form-control js-example-basic-single select2">
                            <option>-- Select --</option>
                            <option value="0" {{ isset($edit_menu) ? (($edit_menu->main_child == 0) ? 'selected' : '') : '' }}>Main Menu
                            </option>
                            <option value="1" {{ isset($edit_menu) ? (($edit_menu->main_child == 1) ? 'selected' : '') : '' }}>Chlid Menu
                            </option>
                            <span class="text-danger">
                                @error('main_child')
                                    {{ $message }}
                                @enderror
                            </span>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group" id="parent" style="display: none">
                        <label><b>Under Main Menu</b></label>
                        <select class="form-control js-example-basic-single select2" name="parent_id">
                            <option value="">--Select a Parent Menu--</option>
                            @foreach ($parent_menus as $menu)
                            {{ $menu->id }}
                                <option value="{{ $menu->id }}"
                                    {{ isset($edit_menu) ? (($edit_menu->parent_id == $menu->id) ? 'selected' : '') : '' }}
                                    >{{ $menu->name }}
                                </option>
                            @endforeach
                            <span class="text-danger">
                                @error('parent_id')
                                    {{ $message }}
                                @enderror
                            </span>
                            {{-- {{isset($edit_menu) ? (($edit_menu->parent_id == $menu->id) ? 'selected' : '') : ''}} --}}
                        </select>
                    </div>
                    <div class="form-group" id="header_footer">
                        <label for="">Show in</label>
                        <select name="show_in" id="" class="form-control js-example-basic-single select2">
                            <option>-- Select One --</option>
                            <option value="1" {{ isset($edit_menu) ? (($edit_menu->header_footer == 1) ? 'selected' : '') : '' }}>Header
                            </option>
                            <option value="2" {{ isset($edit_menu) ? (($edit_menu->header_footer == 2) ? 'selected' : '') : '' }}>Footer
                            </option>
                            <option value="3" {{ isset($edit_menu) ? (($edit_menu->header_footer == 3) ? 'selected' : '') : '' }}>Header &
                                Footer</option>
                            <span class="text-danger">
                                @error('show_in')
                                    {{ $message }}
                                @enderror
                            </span>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description1" id="" cols="30" rows="10">
                                {{ isset($edit_menu) ? $edit_menu->content : old('description1') }}
                            </textarea>
                        <span class="text-danger">
                            @error('description1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-12">
                    @if (isset($edit_menu))
                        <button class="btn btn-success">Update</button>
                    @else
                        <button class="btn btn-success">Save</button>
                    @endif

                </div>
            </div>
            </form>
        </div>
    </div>


@stop
@push('scripts')
    <script>
        @if (isset($edit_menu))
            $(window).ready(function() {

                var main_child = $('.main_child').children("option:selected").val();

                if (main_child == 1) {
                    document.getElementById("parent").style.display = "block";
                    document.getElementById("header_footer").style.display = "none";
                } else if (main_child == 0) {
                    document.getElementById("parent").style.display = "none";
                    document.getElementById("header_footer").style.display = "block";
                }
            })
        @endif
    </script>
    <script>
        $(function() {
            $('.main_child').change(function() {
                var main_child = $(this).children("option:selected").val();
                if (main_child == 1) {
                    document.getElementById("parent").style.display = "block";
                    document.getElementById("header_footer").style.display = "none";
                } else if (main_child == 0) {
                    document.getElementById("parent").style.display = "none";
                    document.getElementById("header_footer").style.display = "block";
                }
            })
        });
    </script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('placeholder_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile1 = function(event) {
            var image = document.getElementById('placeholder_image1');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
