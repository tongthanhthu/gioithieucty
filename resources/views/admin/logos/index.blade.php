@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Logo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Logo</li>
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
                    <a href="{{ route('admin.logos.add') }}">
                        <button type="button" class="btn btn-primary">Thêm logo</button>
                    </a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr style="text-align: center">
                        <th scope="col">STT</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Ảnh Chia Sẻ</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($logos)
                        @php
                            $perPage = $logos->perPage();
                            $currentPage = $logos->currentPage();
                            $stt = ($currentPage - 1) * $perPage;
                        @endphp
                        @foreach($logos as $key => $logo)
                            <tr style="text-align: center">
                                <th scope="row">{{ ++$stt }}</th>
                                <td>
                                    @if($logo->image)
                                        <img src="{{asset('storage/'. $logo->image)}}" alt="" width="100">
                                    @endif
                                </td>
                                <td>
                                    @if($logo->icon)
                                        <img src="{{asset('storage/'. $logo->icon)}}" alt="" width="100">
                                    @endif
                                </td>
                                <td>
                                    @if($logo->image_share)
                                        <img src="{{asset('storage/'. $logo->image_share)}}" alt="" width="100">
                                    @endif
                                </td>
                                <td>{{ $logo->status == 1 ? "Hoạt động" : "Vô hiệu hóa" }}</td>
                                <td>
                                    <a class="" href="{{ route('admin.logos.update',['id'=>$logo->id]) }}">
                                        <i class="bi bi-pencil-square mx-1"></i>
                                    </a>
                                    <a class="" href="{{ route('admin.logos.delete',['id'=>$logo->id]) }}"
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
                {{ $logos->links() }}
            </div>
        </div>
    </div>
@endsection






