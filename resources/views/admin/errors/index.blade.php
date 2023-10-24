@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang 404</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">404</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <form action="{{ ($error) ? route('admin.error.update', $error->id) : route('admin.error.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputDescription">Mô tả tiếng việt</label>
                        <textarea class="form-control" rows="4" id="description_vi" name="description_vi">{{ ($error) ? $error->description_vi : old('description_vi') }}</textarea>
                        @error('description_vi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả tiếng anh</label>
                        <textarea class="form-control" rows="4" id="description_en" name="description_en">{{ ($error) ? $error->description_en : old('description_en') }}</textarea>
                        @error('description_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả tiếng nhật</label>
                        <textarea class="form-control" rows="4" id="description_jp" name="description_jp">{{ ($error) ? $error->description_jp : old('description_jp') }}</textarea>
                        @error('description_jp')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả tiếng hàn</label>
                        <textarea class="form-control" rows="4" id="description_kr" name="description_kr">{{ ($error) ? $error->description_kr : old('description_kr') }}</textarea>
                        @error('description_kr')
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
