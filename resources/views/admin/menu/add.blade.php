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
    <form action="{{ route('admin.menus.store') }}" method="POST">
            @csrf
        <div class="content">
            <div class="card">
                <div class="card-header">

                    <div class="form-group">
                        <label for="inputStatus">Cấp bậc</label>

                        <select name="parent_id" id="inputStatus" class="form-control custom-select">
                            <option value="0">Default</option>
                            @foreach ($menus as $val)
                                <option @if (isset($menu['parent_id']) && $menu['parent_id'] == $val['id']) {{ 'selected' }} @endif
                                    value="{{ $val['id'] }}">
                                    @if ($val['level'] == 1)
                                        {{ '----' }}
                                    @endif
                                    @if ($val['level'] == 2)
                                        {{ '------' }}
                                    @endif
                                    {{ $val['name_vi'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="inputStatus">Bố cục</label>
                        <select id="inputStatus" class="form-control custom-select" name="layout" required>
                            <option value="{{ LAYOUT_HEADER }}">Đầu trang</option>
                            <option value="{{ LAYOUT_FOOTER }}">Chân trang</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="inputName">Đường dẫn Tiếng Việt</label>
                        <input type="text" id="inputName" name="url_vi" class="form-control">
                        @error('url_vi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputName">Đường dẫn Tiếng Anh</label>
                        <input type="text" id="inputName" name="url_en" class="form-control">
                        @error('url_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputName">Tên Việt</label>
                        <input type="text" id="inputName" name="name_vi"   class="form-control">
                        @error('name_vi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputName">Tên Anh</label>
                        <input type="text" id="inputName" name="name_en"  class="form-control">
                        @error('name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputName">Tên Nhật</label>
                        <input type="text" id="inputName" name="name_jp"  class="form-control">
                        @error('name_jp')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputName">Tên Hàn</label>
                        <input type="text" id="inputName" name="name_kr"  class="form-control">
                        @error('name_kr')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a onclick="back()" class="btn btn-secondary">Quay lại</a>
                    <input type="submit" value="Lưu" class="btn btn-success float-right">
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
