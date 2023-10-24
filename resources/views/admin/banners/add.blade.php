@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm banner</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <form action="{{ route('admin.banners.postAdd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Việt</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="title_vi" value="{{ old('title_vi') }}" class="form-control">
                    </div>
                    @error('title_vi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="files" class="form-label">Ảnh</label>
                        <input class="form-control" type="file" name="file" value="{{ old('file') }}">
                        <div id="image-preview" style="max-width: 200px"></div>
                    </div>
                    @error('file')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea name="description_vi" value="" class="form-control" rows="4">{{ old('description_vi') }}</textarea>
                    </div>
                    @error('description_vi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="client">Thứ tự ưu tiên</label>
                        <input type="number" name="priority" value="{{ old('priority') }}" class="form-control">
                    </div>
                    @error('priority')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Anh</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea name="description_en" value="" class="form-control" rows="4">{{ old('description_en') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Nhật</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="title_jp" value="{{ old('title_jp') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea name="description_jp" value="" class="form-control" rows="4">{{ old('description_jp') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Hàn</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="title_kr" value="{{ old('title_kr') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea name="description_kr" value="" class="form-control" rows="4">{{ old('description_kr') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Quay lại</a>
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

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) { // Kiểm tra xem tệp có phải là ảnh không
                    const img = document.createElement('img');
                    img.classList.add('preview-image');
                    img.file = file;
                    img.width = 200;
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

