@extends('admin.layouts.app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách email</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách email</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <div class="card">
            <div class="card-body">
               
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Email</th>
                            <th scope="col">Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $post)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $post->email }}</td>
                                {{-- <td>{{\App\Helper\FuncLib::fomatTime($post->created_at)}}</td> --}}
                                <td>{{$post->updated_at->format('H:i  d/m')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
