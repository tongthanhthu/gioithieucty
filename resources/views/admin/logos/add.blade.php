@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Logo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.logos.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm Logo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <form action="{{ route('admin.logos.postAdd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body row justify-content-center">
                    <div class="form-group col-xl-3 d-flex flex-column">
                        <label class="form-label">Ảnh Logo</label>
                        <div id="logo-preview" class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                            <img src="{{ asset('image/default.png') }}" alt="Avatar">
                            </div>
                            <div id="image-preview" class="fileinputLogo-preview fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; height: 200px; line-height: 150px;"></div>
                            <div>
                            <span class="btn default btn-file">
                            <span class="fileinput-new">
                            Chọn ảnh </span>
                            <span class="fileinput-exists">
                            Thay ảnh </span>
                                <input type="file" name="file" aria-invalid="false" value="{{ old('file') }}" id="fileInput">
                            </span>
                            <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput" id="removeFile">
                            Xóa </a>
                            </div>
                            </div>
                        {{-- <input class="form-control" type="file" name="files" value="{{ old('file') }}"> --}}
                        {{-- <div id="image-preview" style="max-width: 300px;margin-top: 10px;"></div> --}}
                    </div>
                    @error('file')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group col-xl-3 d-flex flex-column">
                        <label class="form-label">Biểu Tượng</label>
                        <div id="icon-a-preview" class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                            <img src="{{ asset('image/default.png') }}" alt="Avatar">
                            </div>
                            <div id="icon-preview" class="fileinputIcon-preview fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; height: 200px; line-height: 150px;"></div>
                            <div>
                            <span class="btn default btn-file">
                            <span class="fileinput-new">
                            Chọn ảnh </span>
                            <span class="fileinput-exists">
                            Thay ảnh </span>
                                <input type="file" name="icon" aria-invalid="false" value="{{ old('icon') }}" id="iconInput">
                            </span>
                            <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput" id="removeIcon">
                            Xóa </a>
                            </div>
                            </div>
                        {{-- <input class="form-control" type="file" name="icon" value="{{ old('icon') }}">
                        <div id="icon-preview" style="max-width: 100px;margin-top: 10px;"></div> --}}
                    </div>
                    @error('icon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group col-xl-3 d-flex flex-column">
                        <label for="files" class="form-label">Ảnh Chia Sẻ</label>
                        <div id="share-preview" class="fileinput fileinput-new" data-provides="fileinput">
                            {{-- <input type="hidden" value="" name="file" id="logo-preview-input-hidden"> --}}
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                            <img src="{{ asset('image/default.png') }}" alt="Avatar">
                            </div>
                            <div id="image-share-preview" class="fileinputShare-preview fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; height: 200px; line-height: 150px;"></div>
                            <div>
                            <span class="btn default btn-file">
                            <span class="fileinput-new">
                            Chọn ảnh </span>
                            <span class="fileinput-exists">
                            Thay ảnh </span>
                                <input type="file" name="image_share" aria-invalid="false" value="{{ old('image_share') }}" id="shareInput">
                            </span>
                            <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput" id="removeShare">
                            Xóa </a>
                            </div>
                            </div>
                        {{-- <input class="form-control" type="file" name="image_share" value="{{ old('image_share') }}">
                        <div id="image-share-preview" style="max-width: 100px;margin-top: 10px;"></div> --}}
                    </div>
                    @error('image_share')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="">
                    <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary me-4">Quay lại</a>
                </div>
                <div class="me-2">
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

        document.querySelector('input[name="icon"]').addEventListener('change', function (event) {
            const iconPreview = document.getElementById('icon-preview');
            iconPreview.innerHTML = ''; // Xóa các ảnh trước đó

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) { // Kiểm tra xem tệp có phải là ảnh không
                    const img = document.createElement('img');
                    img.classList.add('preview-image');
                    img.file = file;
                    img.width = 200;
                    iconPreview.appendChild(img);

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

        document.querySelector('input[name="image_share"]').addEventListener('change', function (event) {
            const iconPreview = document.getElementById('image-share-preview');
            iconPreview.innerHTML = ''; // Xóa các ảnh trước đó

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) { // Kiểm tra xem tệp có phải là ảnh không
                    const img = document.createElement('img');
                    img.classList.add('preview-image');
                    img.file = file;
                    img.width = 200;
                    iconPreview.appendChild(img);

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

        // file
        document.getElementById('fileInput').addEventListener('change', function () {
            var element = document.getElementById("logo-preview");

            // Thay thế class "oldClass" bằng class "newClass"
            element.classList.replace("fileinput-new", "fileinput-exists");
        });

        // icon
        document.getElementById('iconInput').addEventListener('change', function () {
            var element = document.getElementById("icon-a-preview");

            // Thay thế class "oldClass" bằng class "newClass"
            element.classList.replace("fileinput-new", "fileinput-exists");
        });

        // share
        document.getElementById('shareInput').addEventListener('change', function () {
            var element = document.getElementById("share-preview");

            // Thay thế class "oldClass" bằng class "newClass"
            element.classList.replace("fileinput-new", "fileinput-exists");
        });

        // file
        document.getElementById('removeFile').addEventListener('click', function (e) {
            e.preventDefault();
            // Lấy phần tử HTML
            var element = document.getElementById("logo-preview");

            // Thay thế class "oldClass" bằng class "newClass"
            element.classList.replace( "fileinput-exists", "fileinput-new",);
            // Reset the input field and preview when the "Xóa" button is clicked
            var input = document.getElementById('fileInput');
            input.value = ''; // Clear the selected file
            var previewElement = document.querySelector('.fileinputLogo-preview');
            previewElement.textContent = '';

        });

        // icon
        document.getElementById('removeIcon').addEventListener('click', function (e) {
            e.preventDefault();
            // Lấy phần tử HTML
            var element = document.getElementById("icon-a-preview");

            // Thay thế class "oldClass" bằng class "newClass"
            element.classList.replace( "fileinput-exists", "fileinput-new",);
            // Reset the input field and preview when the "Xóa" button is clicked
            var input = document.getElementById('iconInput');
            input.value = ''; // Clear the selected file
            var previewElement = document.querySelector('.fileinputIcon-preview');
            previewElement.textContent = '';

        });

        // share
        document.getElementById('removeShare').addEventListener('click', function (e) {
            e.preventDefault();
            // Lấy phần tử HTML
            var element = document.getElementById("share-preview");

            // Thay thế class "oldClass" bằng class "newClass"
            element.classList.replace( "fileinput-exists", "fileinput-new",);
            // Reset the input field and preview when the "Xóa" button is clicked
            var input = document.getElementById('shareInput');
            input.value = ''; // Clear the selected file
            var previewElement = document.querySelector('.fileinputShare-preview');
            previewElement.textContent = '';

        });
    </script>
@endsection

