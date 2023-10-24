@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6>Class Icon Phúc Lợi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cách chọn class icon phúc lợi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    
        <div class="container">
            <h2>Hướng dẫn cách lấy mã code class icon phúc lợi (fontawesome v5)</h2>
            <h4>B1: nhấp vào <a target="_blank" href="https://fontawesome.com/v5/search">Đây</a> để chọn class icon </h4 >
                <br>
                <img src="{{ asset('statics/imgs/tutorial1.webp') }}" width="1300">
                <br>
                <br>
            <h4>B2: chọn icon -> copy class ->paste</h4 >
                <br>
                <img src="{{ asset('statics/imgs/tutorial2.webp') }}" width="1300">
                <br>
                <br>
            <h4>B3: ví dụ icon này class paste là : fas fa-yen-sign</i></h4 > 
                <br>
                <img src="{{ asset('statics/imgs/tutorial3.webp') }}" width="1300">
        </div>
@endsection
