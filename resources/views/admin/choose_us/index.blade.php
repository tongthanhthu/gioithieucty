@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tại sao chọn chúng tôi ?</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tại sao chọn chúng tôi ?</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@php
        $text = file_get_contents(public_path('js/ckediter5/toolbar.js'));
@endphp

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
        <form action="{{ ($chooseUs) ? route('admin.choose_us.update', $chooseUs->id) : route('admin.choose_us.add') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Link video youtube</label>
                        <input type="text" id="inputName" class="form-control" name="link_video" value="{{ ($chooseUs) ? $chooseUs->link_video : old('link_video') }}">
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
                        <label for="inputDescription">Nôi dung tiếng việt</label>
                        <textarea name="content_vi" id="content_vi" class="form-control" rows="4">{{ ($chooseUs) ? $chooseUs->content_vi :  old('content_vi') }}</textarea>
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
                        <label for="inputDescription">Nôi dung tiếng Anh</label>
                        <textarea name="content_en" id="content_en" class="form-control" rows="4">{{ ($chooseUs) ? $chooseUs->content_en :  old('content_en') }}</textarea>
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
                        <label for="inputDescription">Nôi dung tiếng Hàn</label>
                        <textarea name="content_kr" id="content_kr" class="form-control" rows="4">{{ ($chooseUs) ? $chooseUs->content_kr :  old('content_kr') }}</textarea>
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
                        <label for="inputDescription">Nôi dung tiếng Nhật</label>
                        <textarea name="content_jp" id="content_jp" class="form-control" rows="4">{{ ($chooseUs) ? $chooseUs->content_jp :  old('content_jp') }}</textarea>
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
        let back = () =>{
            history.back();
        }
        CKEDITOR.ClassicEditor.create(document.getElementById("content_vi"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("content_en"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("content_jp"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("content_kr"), {
            <?php echo $text; ?>
        });
    </script>


@endsection
