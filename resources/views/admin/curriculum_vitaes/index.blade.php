@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hồ sơ ứng tuyển</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Hồ sơ ứng tuyển</li>
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
{{--                <div class="action my-2" style="float: right;">--}}
{{--                    <a href="{{ route('admin.logos.add') }}">--}}
{{--                        <button type="button" class="btn btn-primary">Thêm logo</button>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <table class="table table-striped">
                    <thead>
                    <tr style="text-align: center">
                        <th scope="col">STT</th>
                        <th scope="col">Tên người ứng tuyển</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Mô tả ngắn</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($cvs)
                        @php
                            $perPage = $cvs->perPage();
                            $currentPage = $cvs->currentPage();
                            $stt = ($currentPage - 1) * $perPage;
                        @endphp
                        @foreach($cvs as $key => $cv)
                            <tr style="text-align: center">
                                <th scope="row">{{ ++$stt }}</th>
                                <th scope="row">{{ $cv->username }}</th>
                                <th scope="row">{{ $cv->phone }}</th>
                                <th scope="row">{{ $cv->email }}</th>
                                <th scope="row">{{ $cv->title }}</th>
                                <th scope="row">{{ $cv->description }}</th>
                                <td>
                                    <a class="" href="{{ route('admin.curriculum_vitaes.download',['id'=>$cv->id]) }}">
                                        <i class="bi bi-download"></i>
                                    </a>
                                    <a class="" href="{{ route('admin.curriculum_vitaes.delete',['id'=>$cv->id]) }}"
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        <i class="bi bi-trash3-fill mx-1"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr style="text-align: center">
                            Không có sản phẩm
                        </tr>
                    @endif
                    </tbody>
                </table>
                <br>
                {{ $cvs->links() }}
            </div>
        </div>
    </div>
@endsection






