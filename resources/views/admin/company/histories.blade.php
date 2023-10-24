@extends('admin.layouts.app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lịch sử hình thành và phát triển</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Lịch sử hình thành và phát triển</li>
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
                    <a href="{{ route('admin.company.histories.add') }}" type="button" class="btn btn-primary">Thêm thông tin</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Sự kiện</th>
                            <th scope="col">Mốc thời gian</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($histories)
                        @php
                            $perPage = $histories->perPage();
                            $currentPage = $histories->currentPage();
                            $stt = ($currentPage - 1) * $perPage;
                        @endphp
                        @foreach ($histories as $history)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td><img src="{{ asset('storage/'. $history->image) }}" alt="" width="100"></td>
                                <td>{{ $history->title_vi }}</td>
                                <td>{{ $history->formation_time }}</td>
                                <td class="td-action">
                                    <a href="{{ route('admin.company.histories.edit', $history->id) }}">
                                        <i class="bi bi-pencil-square" style="color: #6595e6;"></i>
                                    </a>
                                    <span class="" data-bs-toggle="modal" data-bs-target="#deleteHistory"
                                        onclick="deleteHistory({{ $history->id }})">
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
                {{ $histories->links() }}
            </div>
        </div>
    </div>
    <!-- Modal DELETE -->
    <div class="modal fade modal-customize" id="deleteHistory" tabindex="-1" aria-labelledby="deleteHistoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header row">
                    <div class="col-12 text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="icon-box col-12 text-center">
                        <i class="bi bi-x-circle"></i>
                    </div>
                    <h5 class="modal-title text-center" id="deleteHistoryLabel">Bạn có chắc không?</h5>
                </div>
                <div class="modal-body text-center">
                    Bạn muốn xóa bản ghi? Thao tác này không thể hoàn tác.
                </div>
                <form action="{{ route('admin.company.histories.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" name="id" id="idHistoriesDelete">
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
        function deleteHistory(id) {
            $('#idHistoriesDelete').val(id);
        }
    </script>
@endsection
