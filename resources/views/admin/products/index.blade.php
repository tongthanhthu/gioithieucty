@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
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
                    <a href="{{ route('admin.products.add') }}">
                        <button type="button" class="btn btn-primary">Thêm sản phẩm</button>
                    </a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr style="text-align: center">
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($products)
                        @php
                            $perPage = $products->perPage();
                            $currentPage = $products->currentPage();
                            $stt = ($currentPage - 1) * $perPage;
                        @endphp
                        @foreach($products as $key => $product)
                            <tr style="text-align: center">
                                <th scope="row">{{ ++$stt }}</th>
                                <td>{{ $product->name_vi }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{asset('storage/'. $product->image['path'])}}" alt="" width="200">
                                    @endif
                                </td>
                                <td>{{ $product->category->name_vi }}</td>
                                <td>
                                    <a class="" href="{{ route('admin.products.update',['id'=>$product->id]) }}">
                                        <i class="bi bi-pencil-square mx-1"></i>
                                    </a>
                                    <a class="" href="{{ route('admin.products.delete',['id'=>$product->id]) }}"
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
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection






