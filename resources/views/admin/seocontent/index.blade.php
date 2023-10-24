@extends('admin.layouts.app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Seo Content</h1>
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
                    <a href="{{ route('admin.seocontent.add') }}" class="btn btn-primary">Thêm seocontent</a>
                </div>
            
                <table class="table table-striped">
                    @php
                    $perPage = $seocontents->perPage();
                    $currentPage = $seocontents->currentPage();
                    $stt = ($currentPage - 1) * $perPage;
                @endphp
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Vị trí</th>
                            <th scope="col">Name description</th>
                            <th scope="col">Name keywords</th>
                            <th scope="col">property name</th>
                            <th scope="col">property description</th>
                            <th scope="col">property og:title</th>
                            <th scope="col">property og:description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seocontents as $key)
                        <tr>
                            <th scope="row">{{++$stt}}</th>
                            <td>{{ \App\Models\Seocontent::$position[ $key->position ]}}</td>
                            <td>{{$key->description}}</td>
                            <td>{{$key->keywords }}</td>
                            <td>{{$key->property_name }}</td>
                            <td>{{$key->property_description }}</td>
                            <td>{{$key->property_og_title }}</td>
                            <td>{{$key->property_og_description }}</td>
                       
                            <td>
                                <a class="" href="{{ route('admin.seocontent.edit',['id'=>$key->id]) }}">
                                    <i class="bi bi-pencil-square mx-1"></i>
                                </a>
                                <a class="" href="{{ route('admin.seocontent.destroy',['id'=>$key->id]) }}"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    <i class="bi bi-trash3-fill mx-1"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
                <br>
                {{ $seocontents->links() }}
            </div>
        </div>
    </div>
@endsection
