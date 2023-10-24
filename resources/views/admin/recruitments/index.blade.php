@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tuyển dụng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tuyển dụng</li>
                    </ol>
                </div>
            </div>
            @if(Session::has('msg'))
                <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
            @endif
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="action my-2" style="float: right;">
                    <a href="{{ route('admin.recruitments.add') }}">
                        <button type="button" class="btn btn-primary">Thêm tin tuyển dụng</button>
                    </a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr style="text-align: center">
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề tin</th>
                        <th scope="col">Lương</th>
                        <th scope="col">Rank</th>
                        <th scope="col">Địa điểm</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($recruitments)
                        @php
                            $perPage = $recruitments->perPage();
                            $currentPage = $recruitments->currentPage();
                            $stt = ($currentPage - 1) * $perPage;
                        @endphp
                        @foreach($recruitments as $key => $recruitment)
                            <tr style="text-align: center">
                                <th scope="row">{{ ++$stt }}</th>
                                <td>{{ $recruitment->name_vi }}</td>
                                <td>{{ $recruitment->wage_vi }}</td>
                                <td>{{ $recruitment->rank_vi }}</td>
                                <td>{{ $recruitment->location_vi }}</td>
                                <td>
                                    <a class="" href="{{ route('admin.recruitments.update',['id'=>$recruitment->id]) }}">
                                        <i class="bi bi-pencil-square mx-1"></i>
                                    </a>
                                    <a class="" href="{{ route('admin.recruitments.delete',['id'=>$recruitment->id]) }}"
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        <i class="bi bi-trash3-fill mx-1"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr style="text-align: center">
                            Không có tin
                        </tr>
                    @endif
                    </tbody>
                </table>
                <br>
                {{ $recruitments->links() }}
            </div>
        </div>
    </div>
@endsection






