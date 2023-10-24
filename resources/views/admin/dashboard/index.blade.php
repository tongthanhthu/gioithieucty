@extends('admin.layouts.app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>trang chủ</h1> --}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Trang chủ</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ isset($count->cnt_news) ? $count->cnt_news : 0 }}</h3>
                        <p>Tin Tức</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <a href="{{ route('admin.posts.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ isset($count->cnt_products) ? $count->cnt_products : 0 }}</h3>
                        <p>Sản Phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <a href="{{ route('admin.products.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ isset($count->cnt_cvs) ? $count->cnt_cvs : 0 }}</h3>
                        <p>Hồ sơ ứng tuyển</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-person-add"></i>
                    </div>
                    <a href="{{ route('admin.curriculum_vitaes.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
