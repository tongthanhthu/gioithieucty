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
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh mục</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <i class="bi bi-tv"></i>
                <a href="{{ route('admin.menus.layout',LAYOUT_HEADER) }}">Menu header</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <i class="bi bi-tv"></i>
                <a href="{{ route('admin.menus.layout',LAYOUT_FOOTER) }}">Menu footer</a>
            </div>
        </div>
    </div>
@endsection
