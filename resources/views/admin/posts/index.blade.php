@extends('admin.layouts.app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh Mục bài viết</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh mục bài viết</li>
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
                    <a href="{{ route('admin.posts.add') }}" type="button" class="btn btn-primary">Thêm bài viết</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Đường dẫn tiếng việt</th>
                            <th scope="col">Đường dẫn tiếng anh</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>@if($posts)
                        @php
                            $perPage = $posts->perPage();
                            $currentPage = $posts->currentPage();
                            $stt = ($currentPage - 1) * $perPage;
                        @endphp
                        @foreach ($posts as $post)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td><img src="{{ asset('storage/'. $post->image) }}" alt="" width="100"></td>
                                <td>{{ $post->title_vi }}</td>
                                <td>{{ 'tin-tuc/' . $post['slug_vi'].'.html' }}</td>
                                <td>{{ 'news/' . $post['slug_en'].'.html' }}</td>
                                <td>{{ ($post->status == 1) ? STATUS_ACTIVE : STATUS_UNACTIVE }}</td>
                                <td class="td-action">
                                    <a href="{{ route('admin.posts.edit', $post->id) }}">
                                        <i class="bi bi-pencil-square" style="color: #6595e6;"></i>
                                    </a>
                                    <span class="" data-bs-toggle="modal" data-bs-target="#deletePost"
                                        onclick="deletePost({{ $post->id }})">
                                        <i class="bi bi-trash3-fill" style="color: #da2d08;"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr style="text-align: center">
                                Không có thông tin
                            </tr>
                        @endif
                    </tbody>
                </table>
                <br>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    <!-- Modal DELETE -->
    <div class="modal fade modal-customize" id="deletePost" tabindex="-1" aria-labelledby="deletePostLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header row">
                    <div class="col-12 text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="icon-box col-12 text-center">
                        <i class="bi bi-x-circle"></i>
                    </div>
                    <h5 class="modal-title text-center" id="deletePostLabel">Bạn có chắc không?</h5>
                </div>
                <div class="modal-body text-center">
                    Bạn muốn xóa bản ghi? Thao tác này không thể hoàn tác.
                </div>
                <form action="{{ route('admin.posts.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" name="id" id="idPostDelete">
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
        function deletePost(id) {
            $('#idPostDelete').val(id);
        }
    </script>
@endsection
