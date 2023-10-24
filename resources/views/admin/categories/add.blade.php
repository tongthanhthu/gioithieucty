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
    <div class="content">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputStatus">Cấp bậc</label>
                        <select id="inputStatus" class="form-control custom-select" name="parent_id">
                            <option value="0">---</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name_vi}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Trạng thái</label>
                        <select id="inputStatus" class="form-control custom-select" name="status">
                            <option value="1">{{ STATUS_ACTIVE }}</option>
                            <option value="0">{{ STATUS_UNACTIVE }}</option>
                        </select>
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
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="name_vi" value="{{ old('name_vi') }}">
                        @error('name_vi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea class="form-control" rows="4" id="description_vi" name="description_vi">{{ old('description_vi') }}</textarea>
                        @error('description_vi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="name_en" value="{{ old('name_en') }}">
                        @error('name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea class="form-control" rows="4" id="description_en" name="description_en">{{ old('description_en') }}</textarea>
                        @error('description_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Tiêu đề</label>
                        <input type="text" id="inputName" class="form-control" name="name_jp" value="{{ old('name_jp') }}">
                    </div>
                    @error('name_jp')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea class="form-control" rows="4" id="description_jp" name="description_jp">{{ old('description_jp') }}</textarea>
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
                        <input type="text" id="inputName" class="form-control" name="name_kr" value="{{ old('name_kr') }}">
                    </div>
                    @error('name_kr')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDescription">Mô tả chi tiết</label>
                        <textarea class="form-control" rows="4" id="description_kr" name="description_kr">{{ old('description_kr') }}</textarea>
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
