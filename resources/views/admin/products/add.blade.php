@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <form action="{{ route('admin.products.postAdd') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" name="name_vi" value="{{ old('name_vi') }}" class="form-control">
                    </div>
                    @error('name_vi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                         width="20px" height="15px" viewBox="0 0 512.000000 512.000000"
                                         preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                           fill="#e26a6a" stroke="none">
                                            <path d="M705 4971 c-48 -22 -79 -54 -100 -103 -13 -33 -15 -166 -15 -1127 l0
-1089 -52 -17 c-332 -108 -557 -438 -534 -785 7 -118 26 -192 77 -297 89 -186
258 -336 454 -403 l50 -17 5 -434 c4 -379 7 -438 22 -464 71 -130 248 -139
333 -17 l30 44 3 438 3 438 35 6 c70 14 213 97 290 169 123 115 186 214 229
363 35 120 41 226 21 343 -51 291 -251 526 -523 615 l-53 17 -2 1104 -3 1103
-30 44 c-56 80 -155 108 -240 69z m222 -2713 c60 -22 128 -72 165 -119 156
-206 90 -488 -142 -602 -60 -30 -72 -32 -165 -32 -91 0 -106 3 -165 31 -218
103 -295 367 -167 567 102 158 294 222 474 155z"/>
                                            <path d="M2474 4965 c-28 -14 -59 -40 -74 -62 l-25 -37 -5 -439 -5 -439 -69
-24 c-224 -78 -407 -268 -482 -499 -36 -109 -44 -287 -20 -401 23 -104 101
-263 167 -339 95 -110 214 -192 341 -237 l68 -23 2 -1106 3 -1105 25 -37 c30
-44 109 -87 160 -87 51 0 130 43 160 87 l25 37 3 1105 2 1106 68 23 c127 45
246 127 341 237 66 76 144 235 167 339 24 114 16 292 -20 401 -75 231 -258
421 -482 499 l-69 24 -5 439 -5 439 -25 37 c-30 44 -109 87 -160 87 -20 0 -58
-11 -86 -25z m202 -1362 c109 -36 199 -116 246 -219 19 -41 23 -66 23 -154 0
-97 -2 -110 -31 -170 -55 -115 -150 -190 -277 -216 -176 -37 -353 51 -431 216
-29 60 -31 73 -31 170 0 88 4 113 23 154 46 101 136 182 242 219 60 21 174 21
236 0z"/>
                                            <path d="M4250 4968 c-26 -14 -57 -41 -75 -66 l-30 -44 -3 -1103 -2 -1104 -53
-17 c-272 -89 -472 -324 -523 -615 -20 -117 -14 -223 21 -343 43 -149 106
-248 229 -363 77 -72 220 -155 290 -169 l35 -6 3 -438 3 -438 30 -44 c85 -122
262 -113 333 17 15 26 18 85 22 464 l5 434 50 17 c243 83 444 298 509 545 67
252 -7 542 -187 733 -87 91 -209 169 -325 207 l-52 17 0 1092 c0 1039 -1 1093
-19 1131 -47 102 -162 143 -261 93z m143 -2688 c117 -19 212 -80 274 -177 128
-200 51 -464 -167 -567 -59 -28 -74 -31 -165 -31 -93 0 -105 2 -165 32 -250
123 -304 440 -109 635 54 54 133 95 207 108 66 11 61 11 125 0z"/>
                                        </g>
                                    </svg>
                                    <label for="image">Ảnh đại diện sản phẩm</label></span>
                                    <span class="caption-helper">chọn một ảnh duy nhất</span>
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                </div>
                            </div>
                            <div class="portlet-body form album-images overlay_">
                                <div class="form-group param3 upload-ft">
                                    <div style="max-width: 1034px; margin: 0 auto; position: relative; padding-bottom: 69px;"
                                         class="form-control-img ui-sortable" id="sortB_avatar">
                                        <p class="none_avatar" style="color: rgb(224, 34, 34); display: none;">Vui lòng
                                            chọn ảnh đại diện!</p>
                                        <div class="ajax-upload-dragdrop pvm phl uiBoxWhite"
                                             style="vertical-align:top;">
                                            <div class="ajax-file-upload"
                                                 style="position: relative; overflow: hidden; cursor: default;">Thêm ảnh
                                                <div style="margin: 0px; padding: 0px;">
                                                    <input type="file" id="ajax-upload-id-1697160437890" name="file"
                                                           style="position: absolute; cursor: pointer; top: 0px; width: 96px; height: 30px; left: 0px; z-index: 100; opacity: 0;">
                                                </div>
                                            </div>
                                            <span><b>Kéo &amp; Thả Files Ở Đây</b></span>
                                        </div>
                                        <div id="image-preview" style="min-width: 200px;display: flex;flex-wrap: wrap;">
                                        </div>
                                        <div></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('file')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                         width="20px" height="15px" viewBox="0 0 512.000000 512.000000"
                                         preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                           fill="#e26a6a" stroke="none">
                                            <path d="M705 4971 c-48 -22 -79 -54 -100 -103 -13 -33 -15 -166 -15 -1127 l0
-1089 -52 -17 c-332 -108 -557 -438 -534 -785 7 -118 26 -192 77 -297 89 -186
258 -336 454 -403 l50 -17 5 -434 c4 -379 7 -438 22 -464 71 -130 248 -139
333 -17 l30 44 3 438 3 438 35 6 c70 14 213 97 290 169 123 115 186 214 229
363 35 120 41 226 21 343 -51 291 -251 526 -523 615 l-53 17 -2 1104 -3 1103
-30 44 c-56 80 -155 108 -240 69z m222 -2713 c60 -22 128 -72 165 -119 156
-206 90 -488 -142 -602 -60 -30 -72 -32 -165 -32 -91 0 -106 3 -165 31 -218
103 -295 367 -167 567 102 158 294 222 474 155z"/>
                                            <path d="M2474 4965 c-28 -14 -59 -40 -74 -62 l-25 -37 -5 -439 -5 -439 -69
-24 c-224 -78 -407 -268 -482 -499 -36 -109 -44 -287 -20 -401 23 -104 101
-263 167 -339 95 -110 214 -192 341 -237 l68 -23 2 -1106 3 -1105 25 -37 c30
-44 109 -87 160 -87 51 0 130 43 160 87 l25 37 3 1105 2 1106 68 23 c127 45
246 127 341 237 66 76 144 235 167 339 24 114 16 292 -20 401 -75 231 -258
421 -482 499 l-69 24 -5 439 -5 439 -25 37 c-30 44 -109 87 -160 87 -20 0 -58
-11 -86 -25z m202 -1362 c109 -36 199 -116 246 -219 19 -41 23 -66 23 -154 0
-97 -2 -110 -31 -170 -55 -115 -150 -190 -277 -216 -176 -37 -353 51 -431 216
-29 60 -31 73 -31 170 0 88 4 113 23 154 46 101 136 182 242 219 60 21 174 21
236 0z"/>
                                            <path d="M4250 4968 c-26 -14 -57 -41 -75 -66 l-30 -44 -3 -1103 -2 -1104 -53
-17 c-272 -89 -472 -324 -523 -615 -20 -117 -14 -223 21 -343 43 -149 106
-248 229 -363 77 -72 220 -155 290 -169 l35 -6 3 -438 3 -438 30 -44 c85 -122
262 -113 333 17 15 26 18 85 22 464 l5 434 50 17 c243 83 444 298 509 545 67
252 -7 542 -187 733 -87 91 -209 169 -325 207 l-52 17 0 1092 c0 1039 -1 1093
-19 1131 -47 102 -162 143 -261 93z m143 -2688 c117 -19 212 -80 274 -177 128
-200 51 -464 -167 -567 -59 -28 -74 -31 -165 -31 -93 0 -105 2 -165 32 -250
123 -304 440 -109 635 54 54 133 95 207 108 66 11 61 11 125 0z"/>
                                        </g>
                                    </svg>
                                    <label for="images">Ảnh sản phẩm</label>
                                    <span class="caption-helper">Có thể chọn cùng lúc nhiều file để tải lên</span>
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                </div>
                            </div>
                            <div class="portlet-body form album-images overlay_">
                                <div class="form-group param3 upload-ft">
                                    <div style="max-width: 1034px; margin: 0 auto; position: relative; padding-bottom: 69px;"
                                         class="form-control-img ui-sortable" id="sortB_">
                                        <p class="none_avatar" style="color: rgb(224, 34, 34); display: none;">Vui lòng
                                            chọn ảnh đại diện!</p>
                                        <div class="ajax-upload-dragdrop pvm phl uiBoxWhite"
                                             style="vertical-align:top;">
                                            <div class="ajax-file-upload"
                                                 style="position: relative; overflow: hidden; cursor: default;">Thêm ảnh
                                                <div style="margin: 0px; padding: 0px;">
                                                    <input type="file" id="ajax-upload-id-1697160437890" name="files[]"
                                                           multiple=""
                                                           style="position: absolute; cursor: pointer; top: 0px; width: 96px; height: 30px; left: 0px; z-index: 100; opacity: 0;">
                                                </div>
                                            </div>
                                            <span><b>Kéo &amp; Thả Files Ở Đây</b></span>
                                        </div>
                                        <div id="images-preview" style="min-width: 200px;display: flex;flex-wrap: wrap;">
                                        </div>
                                        <div></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <label for="files" class="form-label">Ảnh sản phẩm</label>
                        <input class="form-control" type="file" name="files[]" multiple>
                        <div id="image-preview" style="max-width: 200px;display: flex;"></div> --}}
                    </div>
                    @error('files')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @error('files.*')
                    @foreach ($errors->get('files.*') as $error)
                        @foreach($error as $e)
                            <span class="text-danger">{{ $e }}</span><br>
                        @endforeach
                    @endforeach
                    @enderror
                    <div id="input-container-vi">
                        <label for="files" class="form-label">Thuộc tính sản phẩm</label>
                        <button type="button" style="border: none;background: none" class="add-input">
                            <i class="bi bi-plus-circle"></i>
                        </button>
                        <div class="input-row-vi" style="margin: 5px 0">
                            <input type="text" name="key_vi[]" placeholder="Nhập thuộc tính">
                            <input type="text" name="value_vi[]" placeholder="Nhập giá trị">
                            <button type="button" style="border: none;background: none;display: none;"
                                    class="remove-input">
                                <i class="bi bi-dash-circle"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category">Danh mục</label>
                        <select name="category_id" value="{{ old('category_id') }}" class="form-control custom-select">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name_vi }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea name="description_vi" id="description_vi" class="form-control"
                                  rows="4">{{ old('description_vi') }}</textarea>
                    </div>
                    @error('description_vi')
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
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control">
                    </div>
                    @error('name_en')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div id="input-container-en">
                        <label for="files" class="form-label">Thuộc tính sản phẩm</label>
                        <button type="button" style="border: none;background: none" class="add-input">
                            <i class="bi bi-plus-circle"></i>
                        </button>
                        <div class="input-row-en" style="margin: 5px 0">
                            <input type="text" name="key_en[]" placeholder="Nhập thuộc tính">
                            <input type="text" name="value_en[]" placeholder="Nhập giá trị">
                            <button type="button" style="border: none;background: none;display: none;"
                                    class="remove-input">
                                <i class="bi bi-dash-circle"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea name="description_en" id="description_en" class="form-control"
                                  rows="4">{{ old('description_en') }}</textarea>
                    </div>
                    @error('description_en')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Nhật</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" name="name_jp" value="{{ old('name_jp') }}" class="form-control">
                    </div>
                    @error('name_jp')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div id="input-container-jp">
                        <label for="files" class="form-label">Thuộc tính sản phẩm</label>
                        <button type="button" style="border: none;background: none" class="add-input">
                            <i class="bi bi-plus-circle"></i>
                        </button>
                        <div class="input-row-jp" style="margin: 5px 0">
                            <input type="text" name="key_jp[]" placeholder="Nhập thuộc tính">
                            <input type="text" name="value_jp[]" placeholder="Nhập giá trị">
                            <button type="button" style="border: none;background: none;display: none;"
                                    class="remove-input">
                                <i class="bi bi-dash-circle"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea name="description_jp" id="description_jp" class="form-control"
                                  rows="4">{{ old('description_jp') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Hàn</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" name="name_kr" value="{{ old('name_kr') }}" class="form-control">
                    </div>
                    @error('name_kr')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div id="input-container-kr">
                        <label for="files" class="form-label">Thuộc tính sản phẩm</label>
                        <button type="button" style="border: none;background: none" class="add-input">
                            <i class="bi bi-plus-circle"></i>
                        </button>
                        <div class="input-row-kr" style="margin: 5px 0">
                            <input type="text" name="key_kr[]" placeholder="Nhập thuộc tính">
                            <input type="text" name="value_kr[]" placeholder="Nhập giá trị">
                            <button type="button" style="border: none;background: none;display: none;"
                                    class="remove-input">
                                <i class="bi bi-dash-circle"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea name="description_kr" id="description_kr" class="form-control"
                                  rows="4">{{ old('description_kr') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>

    @php
        $text = file_get_contents(public_path('js/ckediter5/toolbar.js'));
    @endphp

    <script>
        // Sử dụng JavaScript để theo dõi sự kiện khi người dùng chọn ảnh
        //  document.querySelector('input[name="files[]"]').addEventListener('change', function (event) {
        //     const imagePreview = document.getElementById('image-preview');
        //     // imagePreview.innerHTML = ''; // Xóa các ảnh trước đó

        //     const files = event.target.files;
        //     for (let i = 0; i < files.length; i++) {
        //         const file = files[i];
        //         if (file.type.startsWith('image/')) { // Kiểm tra xem tệp có phải là ảnh không
        //             const reader = new FileReader();
        //             reader.onload = function (e) {
        //                 const imageUrl = e.target.result;
        //                 const divHTML = `
        //                     <div class="ajax-file-upload-statusbar" data-item="order_799088">
        //                         <div class="ajax-file-upload-filename" style="display: none;">1. ${file.name}</div>
        //                         <div class="ajax-file-upload-progress" style="display: none;">
        //                             <div class="ajax-file-upload-bar ajax-file-upload-1697168821816" style="width: 100%;"></div>
        //                         </div>
        //                         <div class="ajax-file-upload-file"><img alt="" src="${imageUrl}" width=""></div>
        //                         <div class="ajax-file-upload-del" style="display: none;">Xóa</div>
        //                         <div class="ajax-file-upload-choose" style="display: none;">Chọn làm ảnh đại diện</div>
        //                     </div>`;
        //                 imagePreview.insertAdjacentHTML('beforeend', divHTML);
        //             };
        //             // const img = document.createElement('img');
        //             // img.classList.add('preview-image');
        //             // img.file = file;
        //             // img.width = 200;
        //             // imagePreview.appendChild(img);

        //             // const reader = new FileReader();
        //             // reader.onload = (function (aImg) {
        //             //     return function (e) {
        //             //         aImg.src = e.target.result;
        //             //     };
        //             // })(img);
        //             console.log("aa");
        //             reader.readAsDataURL(file);
        //         }
        //     }
        //     const deleteButtons = document.querySelectorAll('.ajax-file-upload-del');
        //     deleteButtons.forEach(button => {
        //         button.addEventListener('click', function () {
        //             const statusbar = this.parentElement;
        //             statusbar.remove();
        //         });
        //     });

        // });


        function uploadImage(file, className) {
            const imagePreview = document.getElementById(className)
            if (className === 'image-preview') {
                imagePreview.innerHTML = ''; // Xóa các ảnh trước đó
            }
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imageUrl = e.target.result;
                    const divHTML = `
                            <div class="ajax-file-upload-statusbar" data-item="order_799088" data-index="0">
                                <div class="ajax-file-upload-filename" style="display: none;">1. ${file.name}</div>
                                <div class="ajax-file-upload-progress" style="display: none;">
                                    <div class="ajax-file-upload-bar ajax-file-upload-1697168821816" style="width: 100%;"></div>
                                </div>
                                <div class="ajax-file-upload-file"><img alt="" src="${imageUrl}" width=""></div>
                                <div class="ajax-file-upload-del" style="display: none;"><i class="far fa-times-circle"></i></div>
                            </div>`;
                    imagePreview.insertAdjacentHTML('beforeend', divHTML);
                    resolve(); // Đánh dấu Promise là đã hoàn thành
                };
                reader.readAsDataURL(file);
            });
        }

        // ảnh đại diện
        document.querySelector('input[name="file"]').addEventListener('change', async function (event) {
            const file = event.target.files[0]; // Xóa các ảnh trước đó
            if (file.type.startsWith('image/')) {
                await uploadImage(file, 'image-preview'); // Sử dụng await để chờ hàm uploadImage hoàn thành
            }
            // Tất cả các ảnh đã được tải lên, bạn có thể gọi hàm delete ở đây.
            const deleteButtons = document.querySelectorAll('.ajax-file-upload-del');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const statusbar = this.parentElement;
                    const input = document.querySelector(`input[name="files"]`);
                    statusbar.remove();
                    // Xóa giá trị trong input
                    input.value = '';
                });
            });
        });

        document.querySelector('input[name="files[]"]').addEventListener('change', async function (event) {
            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) {
                    await uploadImage(file, 'images-preview'); // Sử dụng await để chờ hàm uploadImage hoàn thành
                }
            }
            // Tất cả các ảnh đã được tải lên, bạn có thể gọi hàm delete ở đây.
            const deleteButtons = document.querySelectorAll('.ajax-file-upload-del');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const statusbar = this.parentElement;
                    const index = statusbar.getAttribute('data-index');
                    const input = document.querySelector(`input[data-index="${index}"]`);
                    statusbar.remove();
                    // Xóa giá trị trong input
                    input.value = '';
                });
            });
        });

        // kéo thả ảnh avatar
        const dropAreaAvatar = document.getElementById('sortB_avatar'); // Lấy phần tử chứa danh sách ảnh

        // Ngăn chặn các sự kiện mặc định của kéo và thả
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropAreaAvatar.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Xử lý sự kiện khi có ảnh được thả vào khu vực
        dropAreaAvatar.addEventListener('drop', handleDrop, false);

        async function handleDrop(e) {
            const imagePreview = document.getElementById('image-preview');

            const file = e.dataTransfer.files[0];

            if (file.type.startsWith('image/')) {
                await uploadImage(file);
            }

            // Tất cả các ảnh đã được tải lên, bạn có thể gọi hàm delete ở đây.
            const deleteButtons = document.querySelectorAll('.ajax-file-upload-del');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const statusbar = this.parentElement;
                    const input = document.querySelector(`input[name="files"]`);
                    statusbar.remove();
                    // Xóa giá trị trong input
                    input.value = '';
                });
            });
        }

        // kéo thả ảnh
        const dropArea = document.getElementById('sortB_'); // Lấy phần tử chứa danh sách ảnh

        // Ngăn chặn các sự kiện mặc định của kéo và thả
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Xử lý sự kiện khi có ảnh được thả vào khu vực
        dropArea.addEventListener('drop', handleDrop, false);

        async function handleDrop(e) {
            const imagePreview = document.getElementById('image-preview');

            const files = e.dataTransfer.files;
            // Xử lý từng tệp tin ở đây
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) {
                    await uploadImage(file);
                }
            }
            // Tất cả các ảnh đã được tải lên, bạn có thể gọi hàm delete ở đây.
            const deleteButtons = document.querySelectorAll('.ajax-file-upload-del');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const statusbar = this.parentElement;
                    const index = statusbar.getAttribute('data-index');
                    const input = document.querySelector(`input[data-index="${index}"]`);
                    statusbar.remove();
                    // Xóa giá trị trong input
                    input.value = '';
                });
            });
        }


        document.addEventListener("DOMContentLoaded", function () {
            var addButtonVi = document.querySelector("#input-container-vi").querySelector(".add-input");
            var addButtonEn = document.querySelector("#input-container-en").querySelector(".add-input");
            var addButtonJp = document.querySelector("#input-container-jp").querySelector(".add-input");
            var addButtonKr = document.querySelector("#input-container-kr").querySelector(".add-input");
            addButtonVi.addEventListener("click", function () {
                var newRow = document.querySelector("#input-container-vi").querySelector(".input-row-vi").cloneNode(true);
                var inputFields = newRow.querySelectorAll('input[type="text"]');
                inputFields.forEach(function (inputField) {
                    inputField.value = '';
                });
                newRow.querySelector(".remove-input").style.display = "inline-block";
                document.querySelector("#input-container-vi").appendChild(newRow);
            });

            addButtonEn.addEventListener("click", function () {
                var newRow = document.querySelector("#input-container-en").querySelector(".input-row-en").cloneNode(true);
                var inputFields = newRow.querySelectorAll('input[type="text"]');
                inputFields.forEach(function (inputField) {
                    inputField.value = '';
                });
                newRow.querySelector(".remove-input").style.display = "inline-block";
                document.querySelector("#input-container-en").appendChild(newRow);
            });

            addButtonJp.addEventListener("click", function () {
                var newRow = document.querySelector("#input-container-jp").querySelector(".input-row-jp").cloneNode(true);
                var inputFields = newRow.querySelectorAll('input[type="text"]');
                inputFields.forEach(function (inputField) {
                    inputField.value = '';
                });
                newRow.querySelector(".remove-input").style.display = "inline-block";
                document.querySelector("#input-container-jp").appendChild(newRow);
            });

            addButtonKr.addEventListener("click", function () {
                var newRow = document.querySelector("#input-container-kr").querySelector(".input-row-kr").cloneNode(true);
                var inputFields = newRow.querySelectorAll('input[type="text"]');
                inputFields.forEach(function (inputField) {
                    inputField.value = '';
                });
                newRow.querySelector(".remove-input").style.display = "inline-block";
                document.querySelector("#input-container-kr").appendChild(newRow);
            });

            $('#input-container-vi').on('click', '.remove-input', function () {
                var inputRow = $(this).closest('.input-row-vi');
                inputRow.remove(); // Xóa dòng hiện tại
            });

            $('#input-container-en').on('click', '.remove-input', function () {
                var inputRow = $(this).closest('.input-row-en');
                inputRow.remove(); // Xóa dòng hiện tại
            });

            $('#input-container-jp').on('click', '.remove-input', function () {
                var inputRow = $(this).closest('.input-row-jp');
                inputRow.remove(); // Xóa dòng hiện tại
            });

            $('#input-container-kr').on('click', '.remove-input', function () {
                var inputRow = $(this).closest('.input-row-kr');
                inputRow.remove(); // Xóa dòng hiện tại
            });
        });


    </script>

    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("description_vi"), {
                <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("description_en"), {
                <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("description_jp"), {
                <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("description_kr"), {
                <?php echo $text; ?>
        });
    </script>
@endsection

