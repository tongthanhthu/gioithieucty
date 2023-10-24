@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.seocontent.store') }}" method="POST">
            @csrf
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <label for="inputUrl">Vị trí</label>
                        <select name="position" id="position" class="form-control" onchange="getEntityData()">
                            @foreach (\App\Models\Seocontent::$position as $key => $val)
                                <option @if (request()->get('position') == $key) selected @endif value="{{ $key }}">{{ $val }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="keywords">keywords</label>
                        <input type="text" name="keywords" class="form-control">
                    </div>
                    @error('keywords')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="description">property name</label>
                        <input type="text" name="property_name" class="form-control">
                    </div>
                    @error('property_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="property_description">property description</label>
                        <input type="text" name="property_description" class="form-control">
                    </div>
                    @error('property_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="property_og_title">property_og_title</label>
                        <input type="text" name="property_og_title" class="form-control">
                    </div>
                    @error('property_og_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="property_og_description">property_og_description</label>
                        <input type="text" name="property_og_description" class="form-control">
                    </div>
                    @error('property_og_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a onclick="back()" class="btn btn-secondary">Quay lại</a>
                    <input type="submit" value="Create new Project" class="btn btn-success float-right">
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </form>
    <script>         
        let back = () =>{
            history.back();
        }
    </script>
@endsection
