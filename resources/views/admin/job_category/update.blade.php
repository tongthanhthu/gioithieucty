@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa vị trí tuyển dụng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa vị trí tuyển dụng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <form action="{{ route('admin.job_category.update', ['id' => $post->id ]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
       
        @include('flash::message')
               
                <div >
                    <div class="form-group">
                        <label for="inputName">Tiếng Việt</label>
                        <input type="text" id="inputName" class="form-control" name="title_vi" value="{{$post->title_vi}}">
                    </div>
                    @error('title_vi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Tiếng Anh</label>
                        <input type="text" id="inputName" class="form-control" name="title_en" value="{{$post->title_en}}">
                    </div>
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Tiếng Nhật</label>
                        <input type="text" id="inputName" class="form-control" name="title_jp" value="{{$post->title_jp}}">
                    </div>
                    @error('title_jp')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Tiếng Hàn</label>
                        <input type="text" id="inputName" class="form-control" name="title_kr" value="{{$post->title_kr}}">
                    </div>
                    @error('title_kr')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            <div class="row">
                <div class="col-12">
                    <a onclick="back()" class="btn btn-secondary">Quay lại</a>
                    <input type="submit" value="Lưu" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </div>
   
    <script>         
        let back = () =>{
            history.back();
        }
    </script>
@endsection
