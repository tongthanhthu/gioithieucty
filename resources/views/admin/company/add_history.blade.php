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
        <form action="{{ route('admin.company.histories.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body collapseVi">
                    <div class="form-group">
                        <label for="inputName">Mốc thời gian</label>
                        <input type="month" id="inputName" class="form-control" name="formation_time">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Hình ảnh</label>
                        <input type="file" id="btnPostImage" class="form-control" required name="image" style="display:none;" onchange="readURL(this, event);">
                        <div id="upload-zone" class="rounded row" onclick="$('#btnPostImage').click()" style="border: 2px solid #ced4da;padding: 20px; margin:0px;display: flex;align-items: center;">
                            <div class="col-3">
                                <img id="img_show" src="{{ asset('image/icon/noimage.png') }}" alt="" width="140" height="140">
                            </div>
                            <div class="col-9">
                                <label>Chọn hình ảnh upload</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Việt</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body collapseVi">
                    <div class="form-group">
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="title_vi">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả sự kiện</label>
                        <textarea class="form-control ckeditor" id="description_vi" rows="4" name="description_vi"></textarea>
                    </div>
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
                <div class="card-body collapseVi">
                    <div class="form-group">
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="title_en">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả sự kiện</label>
                        <textarea class="form-control ckeditor" id="description_en" rows="4" name="description_en"></textarea>
                    </div>
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
                <div class="card-body collapseVi">
                    <div class="form-group">
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="title_jp">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả sự kiện</label>
                        <textarea class="form-control ckeditor" id="description_jp" rows="4" name="description_jp"></textarea>
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
                <div class="card-body collapseVi">
                    <div class="form-group">
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="title_kr">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả sự kiện</label>
                        <textarea class="form-control ckeditor" id="description_kr" rows="4" name="description_kr"></textarea>
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
    </script>
@endsection
