@extends('admin.layouts.app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Danh mục</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
@endsection
@section('content')
    <div class="content menu-customize">
        @include('flash::message')
        <div class="card" style="display: flex;flex-direction: row;min-height:500px;">
            <div class="card-body" style="width:60%;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">ID</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="sortable-list" class="sortable-container">
                        @foreach($menuParent as $menu)
                            <tr id="ex-category-{{ $menu->id }}" class="sortable-item" data-id="{{ $menu->id }}" data-sort-no="{{ $menu->position }}">
                                <th>
                                    <div class="col-auto d-flex align-items-center">
                                        <i class="fa fa-bars text-ec-gray"></i>
                                    </div>
                                </th>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->name_vi }}</td>
                                <td>
                                    <a href="{{ route('admin.menus.view', $menu->id) }}">
                                        <i class="bi bi-eye" style="color: #616eb1;"></i>
                                    </a>
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}">
                                        <i class="bi bi-pencil-square" style="color: #6595e6;"></i>
                                    </a>
                                    <span class="" data-bs-toggle="modal" data-bs-target="#deleteMenu"
                                        onclick="deleteMenu({{ $menu->id }})">
                                        <i class="bi bi-trash3-fill" style="color: #da2d08;"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body viewtree" style="width:40%;">
                <div class="label">
                    <h4>Menu Cây</h4>
                </div>
                <div class="c-directoryTree mb-3">
                    <ul id="viewTreeUl">
                        @foreach($menuTree as $menu)
                            @include('admin.menu.tree', ['menu' => $menu])
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </div>

    <div class="modal fade modal-customize" id="deleteMenu" tabindex="-1" aria-labelledby="deleteMenuLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header row">
                    <div class="col-12 text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="icon-box col-12 text-center">
                        <i class="bi bi-x-circle"></i>
                    </div>
                    <h5 class="modal-title text-center" id="deleteMenuLabel">Bạn có chắc không?</h5>
                </div>
                <div class="modal-body text-center">
                    Bạn muốn xóa bản ghi? Thao tác này không thể hoàn tác.
                </div>
                <form action="" id="deleteForm" method="POST">
                    @csrf
                    @method('Delete')
                    <button type="submit" id="btnSubmitDelete" class="btn btn-primary hide">Submit</button>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" onclick="$('#btnSubmitDelete').click()">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteMenu(id) {
            var route = "{{ route('admin.menus.destroy',':menuId') }}".replace(':menuId', id);
            $('#deleteForm').attr('action', route);
        }
    </script>
    <script>
        $(function() {

            var oldSortNos = [];
            $('.sortable-item').each(function() {
                oldSortNos.push(this.dataset.sortNo);
            });

            var route = "{{ route('admin.menus.movesort') }}";
            var updateSortNo = function() {
                var newSortNos = {};
                var i = 0;
                $('.sortable-item').each(function() {
                    newSortNos[this.dataset.id] = oldSortNos[i];
                    i++;
                });
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: route,
                    type: 'POST',
                    data: newSortNos,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function() {
                        console.log(error);
                    }
                });
            };

            var moveSortNo = function() {
                updateSortNo();
            };

            $('.sortable-container').sortable({
                items: '> .sortable-item',
                cursor: 'move',
                update: function(e, ui) {
                    moveSortNo();
                }
            });
        });
    </script>

@endsection
