@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Giới thiệu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">giới thiệu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <form action="{{ ($introduce) ? route('admin.main_introduce.update', $introduce->id) : route('admin.main_introduce.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputDescription">Kinh nghiệm trong nghề</label>
                        <input type="number" min="1" class="form-control" name="experience" value="{{ ($introduce) ? $introduce->experience : '' }}" >
                    </div>
                    @error('experience')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
                <div class="card-body">
                    <label for="inputStatus">Hình ảnh giới thiệu</label>
                    <input type="file" id="btnPostImage" class="form-control" name="image" style="display:none;" onchange="readURL(this, event);" value="">
                    <div id="upload-zone" class="rounded row" onclick="$('#btnPostImage').click()" style="border: 2px solid #ced4da;padding: 20px; margin:0px;display: flex;align-items: center;">
                        <div class="col-3">
                            <img id="img_show"  src="{{ ($introduce->image) ? asset('storage/'. $introduce->image) : asset('image/icon/noimage.png') }}" alt="" width="140" height="140">
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
                        <label for="inputDescription">Tên công ty</label>
                        <input class="form-control" name="company_name_vi" value="{{ ($introduce) ? $introduce->company_name_vi : '' }}" >
                        @error('company_name_vi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Mô tả</label>
                        <textarea class="form-control" rows="4" id="description_short_vi" name="description_short_vi">{{ ($introduce) ? $introduce->description_short_vi : '' }}</textarea>
                    </div>
     
                    <div class="form-group">
                        <label for="inputDescription">Thông tin chi tiết</label>
                        <textarea class="form-control" rows="4" id="description_vi" name="description_vi">{{ ($introduce) ? $introduce->description_vi : '' }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputDescription">Sơ đồ tổ chức</label>
                        <textarea class="form-control" rows="4" id="company_diagram_vi" name="company_diagram_vi">{{ ($introduce) ? $introduce->company_diagram_vi : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Sứ mệnh</label>
                        <textarea class="form-control" rows="4" id="mission_vi" name="mission_vi">{{ ($introduce) ? $introduce->mission_vi : '' }}</textarea>
                    </div>
                    @error('mission_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputDescription">Tầm nhìn</label>
                        <textarea class="form-control" rows="4" id="vision_vi" name="vision_vi">{{ ($introduce) ? $introduce->vision_vi : '' }}</textarea>
                    </div>
                    @error('vision_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputDescription">Gía trị cốt lõi</label>
                        <textarea class="form-control" rows="4" id="core_value_vi" name="core_value_vi">{{ ($introduce) ? $introduce->core_value_vi : '' }}</textarea>
                    </div>
                    @error('core_value_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputDescription">Triết lý kinh doanh</label>
                        <textarea class="form-control" rows="4" id="business_philosophy_vi" name="business_philosophy_vi">{{ ($introduce) ? $introduce->business_philosophy_vi : '' }}</textarea>
                    </div>
                    @error('business_philosophy_vi')
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
                <div class="card-body collapseVi">
                    <div class="form-group">
                        <label for="inputDescription">Tên công ty</label>
                        <input class="form-control" name="company_name_en" value="{{ ($introduce) ? $introduce->company_name_en : '' }}" >
                        @error('company_name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Mô tả</label>
                        <textarea class="form-control" rows="4" id="description_short_en" name="description_short_en">{{ ($introduce) ? $introduce->description_short_en : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Thông tin chi tiết</label>
                        <textarea class="form-control" rows="4" id="description_en" name="description_en">{{ ($introduce) ? $introduce->description_en : '' }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputDescription">Sơ đồ tổ chức</label>
                        <textarea class="form-control" rows="4" id="company_diagram_en" name="company_diagram_en">{{ ($introduce) ? $introduce->company_diagram_en : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Sứ mệnh</label>
                        <textarea class="form-control" rows="4" id="mission_en" name="mission_en">{{ ($introduce) ? $introduce->mission_en : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Tầm nhìn</label>
                        <textarea class="form-control" rows="4" id="vision_en" name="vision_en">{{ ($introduce) ? $introduce->vision_en : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Gía trị cốt lõi</label>
                        <textarea class="form-control" rows="4" id="core_value_en" name="core_value_en">{{ ($introduce) ? $introduce->core_value_en : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Triết lý kinh doanh</label>
                        <textarea class="form-control" rows="4" id="business_philosophy_en" name="business_philosophy_en">{{ ($introduce) ? $introduce->business_philosophy_en : '' }}</textarea>
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
                        <label for="inputDescription">Tên công ty</label>
                        <input class="form-control" name="company_name_jp" value="{{ ($introduce) ? $introduce->company_name_jp : '' }}" >
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Mô tả</label>
                        <textarea class="form-control" rows="4" id="description_short_jp" name="description_short_jp">{{ ($introduce) ? $introduce->description_short_jp : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Thông tin chi tiết</label>
                        <textarea class="form-control" rows="4" id="description_jp" name="description_jp">{{ ($introduce) ? $introduce->description_jp : '' }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputDescription">Sơ đồ tổ chức</label>
                        <textarea class="form-control" rows="4" id="company_diagram_jp" name="company_diagram_jp">{{ ($introduce) ? $introduce->company_diagram_jp : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Sứ mệnh</label>
                        <textarea class="form-control" rows="4" id="mission_jp" name="mission_jp">{{ ($introduce) ? $introduce->mission_jp : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Tầm nhìn</label>
                        <textarea class="form-control" rows="4" id="vision_jp" name="vision_jp">{{ ($introduce) ? $introduce->vision_jp : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Gía trị cốt lõi</label>
                        <textarea class="form-control" rows="4" id="core_value_jp" name="core_value_jp">{{ ($introduce) ? $introduce->core_value_jp : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Triết lý kinh doanh</label>
                        <textarea class="form-control" rows="4" id="business_philosophy_jp" name="business_philosophy_jp">{{ ($introduce) ? $introduce->business_philosophy_jp : '' }}</textarea>
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
                        <label for="inputDescription">Tên công ty</label>
                        <input class="form-control" name="company_name_kr" value="{{ ($introduce) ? $introduce->company_name_kr : '' }}" >
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Mô tả</label>
                        <textarea class="form-control" rows="4" id="description_short_kr" name="description_short_kr">{{ ($introduce) ? $introduce->description_short_kr : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">Thông tin chi tiết</label>
                        <textarea class="form-control" rows="4" id="description_kr" name="description_kr">{{ ($introduce) ? $introduce->description_kr : '' }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputDescription">Sơ đồ tổ chức</label>
                        <textarea class="form-control" rows="4" id="company_diagram_kr" name="company_diagram_kr">{{ ($introduce) ? $introduce->company_diagram_kr : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Sứ mệnh</label>
                        <textarea class="form-control" rows="4" id="mission_kr" name="mission_kr">{{ ($introduce) ? $introduce->mission_kr : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Tầm nhìn</label>
                        <textarea class="form-control" rows="4" id="vision_kr" name="vision_kr">{{ ($introduce) ? $introduce->vision_kr : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Gía trị cốt lõi</label>
                        <textarea class="form-control" rows="4" id="core_value_kr" name="core_value_kr">{{ ($introduce) ? $introduce->core_value_kr : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Triết lý kinh doanh</label>
                        <textarea class="form-control" rows="4" id="business_philosophy_kr" name="business_philosophy_kr">{{ ($introduce) ? $introduce->business_philosophy_kr : '' }}</textarea>
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

        CKEDITOR.ClassicEditor.create(document.getElementById("company_diagram_vi"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("company_diagram_en"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("company_diagram_jp"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("company_diagram_kr"), {
            <?php echo $text; ?>
        });
    </script>
@endsection
