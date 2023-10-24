@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa đối tác</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa đối tác</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
       @endif
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <form action="{{ route('admin.partner.update',['id' => $partner->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputStatus">Tên đối tác</label>
                        <input type="text" id="inputName" class="form-control" name="title" value="{{ $partner->title }}">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Link</label>
                        <input type="text" id="inputName" class="form-control" name="url" value="{{ $partner->url }}">
                    </div>
                    @error('url')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputStatus">Trạng thái</label>
                        <select id="inputStatus" class="form-control custom-select" name="status">
                            <option value="1" {{ ($partner->status == 1) ? 'selected' : ''}} >{{ STATUS_ACTIVE }}</option>
                            <option value="0" {{ ($partner->status == 0) ? 'selected' : ''}}>{{ STATUS_UNACTIVE }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="files" class="form-label">Chọn ảnh để thay thế</label>
                        <input class="form-control" type="file" name="file" value="{{ old('file') }}">
                        <div id="image-preview" style="max-width: 500px"></div>
                    </div>
                    <div class="form-group" style="display: flex">
                        <label for="inputStatus">Ảnh hiện tại :  </label>
                            <div style="display: flex">
                                <img src="{{asset('storage/'. $partner['image'])}}" alt="" width="100" height="100">
                            </div>
                    </div>
                    @error('file')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.partner.index') }}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Sử dụng JavaScript để theo dõi sự kiện khi người dùng chọn ảnh
        document.querySelector('input[name="file"]').addEventListener('change', function (event) {
            const imagePreview = document.getElementById('image-preview');
            imagePreview.innerHTML = ''; // Xóa các ảnh trước đó
            console.log(imagePreview)

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) { // Kiểm tra xem tệp có phải là ảnh không
                    const img = document.createElement('img');
                    img.classList.add('preview-image');
                    img.file = file;
                    img.width = 500;
                    imagePreview.appendChild(img);

                    const reader = new FileReader();
                    reader.onload = (function (aImg) {
                        return function (e) {
                            aImg.src = e.target.result;
                        };
                    })(img);

                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
@endsection

