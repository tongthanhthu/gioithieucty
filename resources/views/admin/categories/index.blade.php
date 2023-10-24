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
    <div class="content">
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                <div class="action my-2" style="float: right;">
                    <a href="{{ route('admin.categories.add') }}" type="button" class="btn btn-primary">Thêm danh mục</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Đường dẫn tiếng việt</th>
                            <th scope="col">Đường dẫn tiếng anh</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ ($category['level'] != 0) ? "--": '' }}{{ $category['name_vi'] }}</td>
                                <td>{{ 'san-pham?slug=' . $category['slug_vi'] }}</td>
                                <td>{{ 'products?slug=' . $category['slug_en'] }}</td>
                                <td>{{ $category['products_count'] }}</td>
                                <td class="td-action">
                                    <a href="{{ route('admin.categories.edit', $category['id']) }}">
                                        <i class="bi bi-pencil-square" style="color: #6595e6;"></i>
                                    </a>
                                    <span class="" data-bs-toggle="modal" data-bs-target="#deleteCategory"
                                        onclick="deleteCategory({{ $category['id'] }})">
                                        <i class="bi bi-trash3-fill" style="color: #da2d08;"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal DELETE -->
    <div class="modal fade modal-customize" id="deleteCategory" tabindex="-1" aria-labelledby="deleteCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header row">
                    <div class="col-12 text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="icon-box col-12 text-center">
                        <i class="bi bi-x-circle"></i>
                    </div>
                    <h5 class="modal-title text-center" id="deleteCategoryLabel">Bạn có chắc không?</h5>
                </div>
                <div class="modal-body text-center">
                    Bạn muốn xóa bản ghi? Thao tác này không thể hoàn tác.
                </div>
                <form action="{{ route('admin.categories.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" name="id" id="idCateDelete">
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
        function deleteCategory(id) {
            $('#idCateDelete').val(id);
        }
    </script>
@endsection
