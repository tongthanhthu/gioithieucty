@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thư viện ảnh</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Thư viện ảnh</li>
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
{{--                    <a href="{{ route('admin.products.add') }}">--}}
{{--                        <button type="button" class="btn btn-primary">Thêm sản phẩm</button>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <table class="table table-striped">
                    <thead>
                    <tr style="text-align: center">
                        <th scope="col">STT</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Sản phẩm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($images)
                        @php
                            $perPage = $images->perPage();
                            $currentPage = $images->currentPage();
                            $stt = ($currentPage - 1) * $perPage;
                        @endphp
                        @foreach($images as $key => $image)
                            <tr style="text-align: center">
                                <th scope="row">{{ ++$stt }}</th>
                                <td>
                                    @if($image->path)
                                        <a href="{{asset('storage/'. $image['path'])}}" data-lightbox="gallery">
                                            <img src="{{asset('storage/'. $image['path'])}}" alt="" width="250">
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $image->product->name_vi }}</td>
                                <td>
{{--                                    <a class="" href="{{ route('admin.products.delete',['id'=>$product->id]) }}"--}}
{{--                                       onclick="return confirm('Bạn có chắc chắn muốn xóa?');">--}}
{{--                                        <i class="bi bi-trash3-fill mx-1"></i>--}}
{{--                                    </a>--}}
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
                {{ $images->links() }}
            </div>
        </div>
    </div>
@endsection






