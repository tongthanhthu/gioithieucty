@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>NGƯỜI SÁNG LẬP & ĐIỀU HÀNH</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">NGƯỜI SÁNG LẬP & ĐIỀU HÀNH</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <form action="{{ ($ceo) ? route('admin.company.ceo.update', $ceo->id) : route('admin.company.ceo.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputStatus">Hình ảnh</label>
                        <input type="file" id="btnCeoImage" class="form-control" name="image" style="display:none;" onchange="readURL(this, event);">
                        <div id="upload-zone" class="rounded row" onclick="$('#btnCeoImage').click()" style="border: 2px solid #ced4da;padding: 20px; margin:0px;display: flex;align-items: center;">
                            <div class="col-3">
                                <img id="img_show" src="{{ (isset($ceo) && isset($ceo->image)) ? asset('storage/'. $ceo->image) : asset('image/icon/noimage.png') }}" alt="" width="140" height="140">
                            </div>
                            <div class="col-9">
                                <label>Chọn hình ảnh upload</label>
                            </div>
                        </div>
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
                        <label for="inputDescription">Người điều hành</label>
                        <input class="form-control" name="name_vi" value="{{ ($ceo) ? $ceo->name_vi : '' }}" >
                        @error('name_vi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputName">Chức vụ</label>
                        <input type="text" id="inputName" class="form-control" name="position_vi" value="{{ ($ceo) ? $ceo->position_vi : '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputDescription">Thông tin khác</label>
                        <textarea class="form-control" rows="4" id="description_vi" name="description_vi">{{ ($ceo) ? $ceo->description_vi : '' }}</textarea>
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
                        <label for="inputDescription">Nhà điều hành</label>
                        <input class="form-control" name="name_en" value="{{ ($ceo) ? $ceo->name_en : '' }}" >
                        @error('name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputName">Chức vụ</label>
                        <input type="text" id="inputName" class="form-control" name="position_en" value="{{ ($ceo) ? $ceo->position_en : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Thông tin khác tiếng anh</label>
                        <textarea class="form-control" rows="4" id="description_en" name="description_en">{{ ($ceo) ? $ceo->description_en : '' }}</textarea>
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
                        <label for="inputDescription">Nhà điều hành</label>
                        <input class="form-control" name="name_jp" value="{{ ($ceo) ? $ceo->name_jp : '' }}" >
                    </div>
                    <div class="form-group">
                        <label for="inputName">Chức vụ</label>
                        <input type="text" id="inputName" class="form-control" name="position_jp" value="{{ ($ceo) ? $ceo->position_jp : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Thông tin khác</label>
                        <textarea class="form-control" rows="4" id="description_jp" name="description_jp">{{ ($ceo) ? $ceo->description_jp : '' }}</textarea>
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
                        <label for="inputDescription">Nhà điều hành</label>
                        <input class="form-control" name="name_kr" value="{{ ($ceo) ? $ceo->name_kr : '' }}" >
                    </div>
                    <div class="form-group">
                        <label for="inputName">Chức vụ</label>
                        <input type="text" id="inputName" class="form-control" name="position_kr" value="{{ ($ceo) ? $ceo->position__kr : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Thông tin khác</label>
                        <textarea class="form-control" rows="4" id="description_kr" name="description_kr">{{ ($ceo) ? $ceo->description_kr : '' }}</textarea>
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
    @php
        $text = file_get_contents(public_path('js/ckediter5/toolbar.js'));
    @endphp
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
