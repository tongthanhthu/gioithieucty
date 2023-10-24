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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <div class="action my-2" style="float: right;">
                    <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">Thêm danh mục</a>
                </div>
                <div class="col-md-4">
                    <div>

                        @foreach($menuTree as $key => $val)
                            <div>
                                @if($val["level"] == 1){{"----"}}@endif
                                @if($val["level"] == 2){{"------"}}@endif
                                <a href="{{ route('admin.menus.edit', $val["id"]) }}" class='btn btn-default btn-xs'>
                                    {{$val["name_vi"]}}
                                </a>
                                {{-- <a target="_blank" href="{{$val["url"]}}">Link</a> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
                <table class="table table-striped">
                    @php
                        $i = 1;
                    @endphp
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Việt</th>
                            <th scope="col">Url</th>
                            <th scope="col">Vị trí</th>
                            <th scope="col">ParentId</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $key)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$key->name_vi}}</td>
                            <td>{{$key->url}}</td>
                            <td>{{$key->position}}</td>
                            <td>{{$key->parent_id}}</td>
                            <td>
                            {!! Form::open(['route' => ['admin.menus.destroy', $key->id], 'method' => 'delete']) !!}
                                <span><a href="{{ route('admin.menus.edit' , [$key->id] ) }}" class="bi bi-pencil-square"></a></span>
                                {{-- <form action="{{ route('admin.menus.destroy' , [$key->id]) }}"> --}}
                                    {{-- <span><a href="{{ route('admin.menus.destroy' , [$key->id]) }}" class="bi bi-trash3-fill"></a></span> --}}
                                    {{-- <button type="submit" class="bi bi-trash3-fill"></button>
                                </form> --}}
                                {!! Form::button('<i class="bi bi-trash3-fill"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Bạn có chắc chắn xóa không ?')"]) !!}
                            {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
