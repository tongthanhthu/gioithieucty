@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đối tác</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Đối tác</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="action my-2" style="float: right;">
                    <a href="{{ route('admin.partner.add') }}">
                        <button type="button" class="btn btn-primary">Thêm Đối tác</button>
                    </a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr style="text-align: center">
                        <th scope="col">STT</th>
                        <th scope="col">Tên đối tác</th>
                        <th scope="col">Link</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($partner) && !empty($partner))
                        @php
                            $perPage = $partner->perPage();
                            $currentPage = $partner->currentPage();
                            $stt = ($currentPage - 1) * $perPage;
                        @endphp
                        @foreach($partner as $key => $value)
                            <tr style="text-align: center">
                                <th scope="row">{{ ++$stt }}</th>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->url }}</td>
                                <td>
                                    @if($value->image)
                                        <img src="{{ asset('storage/'. $value->image)}}" alt="" width="100" height="100">
                                    @endif
                                </td>
                                <td>{{ $value->status == 1 ? "Hiển thị" : "Không hiển thị" }}</td>
                                <td>
                                    <a class="" href="{{ route('admin.partner.edit',['id'=>$value->id]) }}">
                                        <i class="bi bi-pencil-square mx-1"></i>
                                    </a>
                                    <a class="" href="{{ route('admin.partner.delete',['id'=>$value->id]) }}"
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        <i class="bi bi-trash3-fill mx-1"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr style="text-align: center">
                            Chưa có đối tác nào
                        </tr>
                    @endif
                    </tbody>
                </table>
                <br>
                {{ $partner->links() }}
            </div>
        </div>
    </div>
@endsection






