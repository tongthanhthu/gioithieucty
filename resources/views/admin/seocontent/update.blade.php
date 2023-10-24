@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Content</h1>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@section('content')
        <form action="{{ route('admin.seocontent.update', [$seocontents->id]) }}" method="Patch">
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
                        <input type="text" name="description" value="{{$seocontents->description}}" class="form-control">
                    </div>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="keywords">keywords</label>
                        <input type="text" name="keywords" value="{{$seocontents->keywords}}" class="form-control">
                    </div>
                    @error('keywords')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="description">property_name</label>
                        <input type="text" name="property_name" value="{{$seocontents->property_name}}" class="form-control">
                    </div>
                    @error('property_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="property_description">property_description</label>
                        <input type="text" name="property_description" value="{{$seocontents->property_description}}" class="form-control">
                    </div>
                    @error('property_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="property_og_title">property_og_title</label>
                        <input type="text" name="property_og_title" value="{{$seocontents->property_og_title}}" class="form-control">
                    </div>
                    @error('property_og_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="property_og_description">property_og_description</label>
                        <input type="text" name="property_og_description" value="{{$seocontents->property_og_description}}" class="form-control">
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
    </form>
    <script>         
        let back = () =>{
            history.back();
        }
    </script>
@endsection
