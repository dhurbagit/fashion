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
                    <a class="btn btn-primary" href="{{ route('menu.page.create') }}">Create List</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h3><b>Top Navbar Menu</b></h3>
                    <br>
                    <br>
                </div>
                <div class="col-md-12">
                    <div class="menu-box">
                        {{-- @dd($mega_menus->count()) --}}
                        @if ($info['menu_items']->count() > 0)
                            <ol class="menu-list sortable">
                                @foreach ($menus as $menu)
                                    @if ($menu->parent_id == null)
                                        <li id="menuItem_{{ $menu->id }}">
                                            <div class="flex_box">
                                                <a href="javascript:void(0)">{{ $menu->name }}
                                                    <div class="form-check form-switch">
                                                        <input data-id="{{ $menu->id }} "
                                                            class="drag_button form-check-input status_action"
                                                            type="checkbox" role="switch" name="status"
                                                            id="flexSwitchCheckChecked_ "
                                                            @if ($menu->publish_status == 1) checked @endif>
                                                    </div>
                                                </a>
                                                <div class="action_button">

                                                    <a class="btn btn-success"
                                                        href="{{ route('menu.page.edit', $menu->id) }}"> <i
                                                            class="fe fe-edit-2" data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Edit Menu"
                                                            aria-label="fe fe-edit-2"></i></a>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop_{{ $menu->id }}">
                                                        <i class="fe fe-trash-2" data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Delete Menu" aria-label="fe fe-trash-2"
                                                            aria-describedby="tooltip778232"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade cs_modal" id="staticBackdrop_{{ $menu->id }}"
                                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                                        Are You
                                                                        Sure ?</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"><i
                                                                            class="fa fa-times" data-bs-toggle="tooltip"
                                                                            title=""
                                                                            data-bs-original-title="Close Modal"
                                                                            aria-label="fa fa-times"></i></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    You won't be able to revert this!
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('menu.page.destroy', $menu->id) }}"
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
                                                </div>
                                            </div>
                                            <ol class="submenu-list">
                                                @foreach ($menu->childrens as $submenu)
                                                    <li id="menuItem_{{ $submenu->id }}">
                                                        <div class="flex_box">
                                                            <a href="javascript:void(0)">
                                                                <div>
                                                                    {{ $submenu->name }} <span class="text-success">Sub menu
                                                                        of {{ $menu->name }}</span>
                                                                </div>
                                                                <div class="form-check form-switch">
                                                                    <input data-id="{{ $submenu->id }} "
                                                                        class="drag_button form-check-input status_action"
                                                                        type="checkbox" role="switch" name="status"
                                                                        id="flexSwitchCheckChecked_ "
                                                                        @if ($submenu->publish_status == 1) checked @endif>
                                                                </div>
                                                            </a>
                                                            <div class="action_button">

                                                                <a class="btn btn-success"
                                                                    href="{{ route('menu.page.edit', $submenu->id) }}"> <i
                                                                        class="fe fe-edit-2" data-bs-toggle="tooltip"
                                                                        title="" data-bs-original-title="Edit Menu"
                                                                        aria-label="fe fe-edit-2"></i></a>

                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop_{{ $submenu->id }}">
                                                                    <i class="fe fe-trash-2" data-bs-toggle="tooltip"
                                                                        title="" data-bs-original-title="Delete Menu"
                                                                        aria-label="fe fe-trash-2"
                                                                        aria-describedby="tooltip778232"></i>
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade cs_modal"
                                                                    id="staticBackdrop_{{ $submenu->id }}"
                                                                    data-bs-backdrop="static" data-bs-keyboard="false"
                                                                    tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="staticBackdropLabel">Are You
                                                                                    Sure ?</h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"><i
                                                                                        class="fa fa-times"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title=""
                                                                                        data-bs-original-title="Close Modal"
                                                                                        aria-label="fa fa-times"></i></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                You won't be able to revert this!
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <form
                                                                                    action="{{ route('menu.page.destroy', $submenu->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <button type="submit"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Yes</button>
                                                                                    <button type="button"
                                                                                        data-bs-dismiss="modal"
                                                                                        class="btn btn-primary">No</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </li>
                                    @endif
                                @endforeach
                                <div class="form-group mt-4">
                                    <button type="button" class="btn btn-success btn-sm btn-flat" id="serialize"><i
                                            class="fa fa-save"></i>
                                        Update Menu
                                    </button>
                                </div>
                            </ol>
                        @else
                            <p class="text-center">Menu not found in database</p>
                        @endif
                    </div>

                </div>
                <div class="col-md-12">
                    <h3>Footer Navbar Menu</h3>
                    <br>
                    <br>
                    <div class="menu-box">
                        {{-- @dd($mega_menus->count()) --}}
                        @if ($info['menu_footer']->count() > 0)
                            <ol class="menu-list sortable_child">
                                @foreach ($fmenus as $menu)
                                    @if ($menu->parent_id == null)
                                        <li id="menuItem_{{ $menu->id }}">
                                            <div class="flex_box">
                                                <a href="javascript:void(0)">{{ $menu->name }}
                                                    <div class="form-check form-switch">
                                                        <input data-id="{{ $menu->id }} "
                                                            class="drag_button form-check-input status_action"
                                                            type="checkbox" role="switch" name="status"
                                                            id="flexSwitchCheckChecked_ "
                                                            @if ($menu->publish_status == 1) checked @endif>
                                                    </div>
                                                </a>
                                                <div class="action_button">
                                                    <a class="btn btn-success"
                                                        href="{{ route('menu.page.edit', $menu->id) }}"> <i
                                                            class="fe fe-edit-2" data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Edit Menu"
                                                            aria-label="fe fe-edit-2"></i></a>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop_{{ $menu->id }}">
                                                        <i class="fe fe-trash-2" data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Delete Menu"
                                                            aria-label="fe fe-trash-2"
                                                            aria-describedby="tooltip778232"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade cs_modal"
                                                        id="staticBackdrop_{{ $menu->id }}" data-bs-backdrop="static"
                                                        data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                                        Are You
                                                                        Sure ?</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"><i
                                                                            class="fa fa-times" data-bs-toggle="tooltip"
                                                                            title=""
                                                                            data-bs-original-title="Close Modal"
                                                                            aria-label="fa fa-times"></i></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    You won't be able to revert this!
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('menu.page.destroy', $menu->id) }}"
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
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                                <div class="form-group mt-4">
                                    <button type="button" class="btn btn-success btn-sm btn-flat"
                                        id="serialize_child"><i class="fa fa-save"></i>
                                        Update Menu
                                    </button>
                                </div>
                            </ol>
                        @else
                            <p class="text-center">Menu not found in database</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ***************** --}}

@stop
@push('scripts')
    <script>
        $('.status_action').change(function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "post",
                url: "{{ route('menu.status') }}",
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
    <script>
        $(document).ready(function() {
            $('.sortable').nestedSortable({
                forcePlaceholderSize: true,
                items: 'li',
                handle: 'a',
                placeholder: 'menu-highlight',
                listType: 'ol',
                maxLevels: 2,
                opacity: .6,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.sortable_child').nestedSortable({
                forcePlaceholderSize: true,
                items: 'li',
                handle: 'a',
                placeholder: 'menu-highlight',
                listType: 'ol',
                maxLevels: 2,
                opacity: .6,
            });
        });
    </script>
    {{-- menu sortable js --}}

    <script>
        // related
        $("#serialize").click(function(e) {

            e.preventDefault();
            $(this).prop("disabled", true);
            $(this).html(
                `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Updating...`
            );
            var serialized = $('ol.sortable').nestedSortable('serialize');

            console.log(serialized);

            $.ajax({
                url: "{{ route('updateMenuOrder') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    sort: serialized,
                },
                success: function(res) {
                    toastr.options.closeButton = true
                    toastr.success('Menu Order Successfuly', "Success !");
                    $('#serialize').prop("disabled", false);
                    $('#serialize').html(`<i class="fa fa-save"></i> Update Menu`);
                    window.location.reload();
                }
            });
        });
        $("#serialize_child").click(function(e) {

            e.preventDefault();
            $(this).prop("disabled", true);
            $(this).html(
                `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Updating...`
            );
            var serialized = $('ol.sortable_child').nestedSortable('serialize');

            console.log(serialized);

            $.ajax({
                url: "{{ route('updateMenuOrder') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    sort: serialized,
                },
                success: function(res) {
                    toastr.options.closeButton = true
                    toastr.success('Menu Order Successfuly', "Success !");
                    $('#serialize_child').prop("disabled", false);
                    $('#serialize_child').html(`<i class="fa fa-save"></i> Update Menu`);
                }
            });
        });
    </script>
    {{-- menu sortable js --}}
@endpush
