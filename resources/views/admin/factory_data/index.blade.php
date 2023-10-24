@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Số liệu nhà máy</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Số liệu nhà máy</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <form action="{{ ($data) ? route('admin.factory_data.update', $data->id) : route('admin.factory_data.add') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Số Phân xưởng</label>
                        <input type="number" id="inputName" class="form-control" name="factory" value="{{ ($data) ? $data->factory : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Số Máy móc</label>
                        <input type="number" id="inputName" class="form-control" name="machines" value="{{ ($data) ? $data->machines : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Số Nhân lực</label>
                        <input type="number" id="inputName" class="form-control" name="human" value="{{ ($data) ? $data->human : '' }}">
                    </div>
                    
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
