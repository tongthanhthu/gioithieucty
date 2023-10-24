@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Các phúc lợi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách phúc lợi</li>
                    </ol>
                </div>
            </div>
            @if (Session::has('msg'))
                <div class="alert alert-success" role="alert">{{ Session::get('msg') }}</div>
            @endif
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="action my-2" style="float: right;">
                    <a href="{{ route('admin.benefits.add') }}">
                        <button type="button" class="btn btn-primary">Thêm phúc lợi</button>
                    </a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">STT</th>
                            <th scope="col">Mã class icon</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($benefits)
                            @php
                                $perPage = $benefits->perPage();
                                $currentPage = $benefits->currentPage();
                                $stt = ($currentPage - 1) * $perPage;
                            @endphp
                            @foreach ($benefits as $key => $benefit)
                                <tr style="text-align: center">
                                    <th scope="row">{{ ++$stt }}</th>
                                    <td>
                                        {{ $benefit->path }}
                                    </td>
                                    <td>
                                        {{ $benefit->des_vi }}
                                    </td>
                                    <td>
                                        <a class="" href="{{ route('admin.benefits.update', ['id' => $benefit->id]) }}">
                                            <i class="bi bi-pencil-square mx-1"></i>
                                        </a>
                                        <a class="" href="{{ route('admin.benefits.delete', ['id' => $benefit->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            <i class="bi bi-trash3-fill mx-1"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr style="text-align: center">
                                Không có phúc lợi nào
                            </tr>
                        @endif
                    </tbody>
                </table>
                <br>
                {{ $benefits->links() }}
            </div>
        </div>
    </div>
@endsection
