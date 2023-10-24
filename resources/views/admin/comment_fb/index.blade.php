@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cài đặt App Id bình luận Facebook</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cài đặt App Id bình luận Facebook</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <form action="{{ ($data) ? route('admin.comment_fb.update', $data->id) : route('admin.comment_fb.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Id App Facebook</label>
                        <input type="number" id="inputName" class="form-control" name="id_fb" value="{{ ($data) ? $data->id_fb : '' }}">
                        @error('id_fb')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
