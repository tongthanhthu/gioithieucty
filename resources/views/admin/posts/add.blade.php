@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm bài viết</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputStatus">Tác giả</label>
                        <input type="text" id="inputName" class="form-control" name="author" value="{{ old('author') }}">
                    </div>
                    @error('author')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputStatus">Trạng thái</label>
                        <select id="inputStatus" class="form-control custom-select" name="status" required>
                            <option value="1">{{ STATUS_ACTIVE }}</option>
                            <option value="0">{{ STATUS_UNACTIVE }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Hình ảnh</label>
                        <input type="file" id="btnPostImage" class="form-control" name="image" style="display:none;" onchange="readURL(this, event);">
                        <div id="upload-zone" class="rounded row" onclick="$('#btnPostImage').click()" style="border: 2px solid #ced4da;padding: 20px; margin:0px;display: flex;align-items: center;">
                            <div class="col-3">
                                <img id="img_show" src="{{ asset('image/icon/noimage.png') }}" alt="" width="140" height="140">
                            </div>
                            <div class="col-9">
                                <label>Chọn hình ảnh upload</label>
                            </div>
                        </div>
                    </div>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Việt</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body collapseVi">
                    <div class="form-group">
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="title_vi" value="{{ old('title_vi') }}">
                    </div>
                    @error('title_vi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Mô tả ngắn gọn</label>
                        <textarea class="form-control ckeditor" id="description_short_vi" rows="4" name="description_short_vi">{{ old('description_short_vi') }}</textarea>
                    </div>
                    @error('description_short_vi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Nội dung</label>
                        <textarea class="form-control ckeditor" id="description_vi" rows="4" name="description_vi">{{ old('description_vi') }}</textarea>
                    </div>
                    @error('description_vi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Tag</label>
                        <input type="text" id="inputTagVi" class="form-control d-none" name="tag_vi" value="{{ old('tag_vi') }}">
                        <select id="tagSelectVi" multiple>
                            <option value=""></option>
                        </select>
                    </div>
                    @error('tag_vi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Anh</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="title_en" value="{{ old('title_en') }}">
                    </div>
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Mô tả ngắn gọn</label>
                        <textarea class="form-control ckeditor" rows="4" id="description_short_en" name="description_short_en">{{ old('description_short_en') }}</textarea>
                    </div>
                    @error('description_short_en')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Nội dung</label>
                        <textarea class="form-control ckeditor" id="description_en" name="description_en">{{ old('description_en') }}</textarea>
                    </div>
                    @error('description_en')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Tag</label>
                        <input type="text" id="inputTagEn" class="form-control d-none" name="tag_en" value="{{ old('tag_en') }}">
                        <select id="tagSelectEn" multiple>
                            <option value=""></option>
                        </select>
                    </div>
                    @error('tag_en')
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
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="title_jp" value="{{ old('title_jp') }}">
                    </div>
                    @error('title_jp')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Mô tả ngắn gọn</label>
                        <textarea class="form-control ckeditor" rows="4" id="description_short_jp" name="description_short_jp">{{ old('description_short_jp') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Nội dung</label>
                        <textarea class="form-control ckeditor" id="description_jp" name="description_jp">{{ old('description_jp') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Tag</label>
                        <input type="text" id="inputTagJp" class="form-control d-none" name="tag_jp" value="{{ old('tag_jp') }}">
                        <select id="tagSelectJp" multiple>
                            <option value=""></option>
                        </select>
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
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="title_kr" value="{{ old('title_kr') }}">
                    </div>
                    @error('title_kr')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Mô tả ngắn gọn</label>
                        <textarea class="form-control ckeditor" rows="4" id="description_short_kr" name="description_short_kr">{{ old('description_short_kr') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Nội dung</label>
                        <textarea class="form-control ckeditor" id="description_kr" name="description_kr">{{ old('description_kr') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Tag</label>
                        <input type="text" id="inputTagKr" class="form-control d-none" name="tag_kr" value="{{ old('tag_kr') }}">
                        <select id="tagSelectKr" multiple>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a onclick="back()" class="btn btn-secondary">Quay lại</a>
                    <input type="submit" value="Lưu" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </div>
    @php
        $text = file_get_contents(public_path('js/ckediter5/toolbar.js'));
    @endphp
    <script>        
            function readURL(input, event) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img_show')
                            .attr('src', e.target.result)
                            .width(140)
                            .height(140)
                            ;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            };
    </script>
        
    <script>        
        let back = () =>{
            history.back();
        }
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
        CKEDITOR.ClassicEditor.create(document.getElementById("description_short_vi"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("description_short_en"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("description_short_jp"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("description_short_kr"), {
            <?php echo $text; ?>
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tagSelectVi').selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    };
                },
                onChange: function(value) {
                    var tags = value.join(',');
                    $('#inputTagVi').val(tags);
                    console.log(tags);
                }
            });
            $('#tagSelectEn').selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    };
                },
                onChange: function(value) {
                    var tags = value.join(',');
                    $('#inputTagEn').val(tags);
                    console.log(tags);
                }
            });
            $('#tagSelectJp').selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    };
                },
                onChange: function(value) {
                    var tags = value.join(',');
                    $('#inputTagJp').val(tags);
                    console.log(tags);
                }
            });
            $('#tagSelectKr').selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    };
                },
                onChange: function(value) {
                    var tags = value.join(',');
                    $('#inputTagKr').val(tags);
                    console.log(tags);
                }
            });
        });
    </script>
@endsection
