@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liên hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Liên hệ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <form action="{{ ($contact) ? route('admin.contacts.update', $contact->id) : route('admin.contacts.add') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Số điện thoại</label>
                        <input type="text" id="inputName" class="form-control" name="phone" value="{{ ($contact) ? $contact->phone : '' }}">
                    </div>
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Email</label>
                        <input type="email" id="inputName" class="form-control" name="email" value="{{ ($contact) ? $contact->email : '' }}">
                    </div>
                    @error('email')
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
                        <label for="inputDescription">Thông tin</label>
                        <textarea class="form-control" rows="4" name="about_vi">{{ ($contact) ? $contact->about_vi : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Thời gian làm việc</label>
                        <input type="text" id="inputName" class="form-control" name="timework_vi" value="{{ ($contact) ? $contact->timework_vi : '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputDescription">Địa chỉ</label>
                        <textarea class="form-control" rows="4" id="address_vi" name="address_vi">{{ ($contact) ? $contact->address_vi : '' }}</textarea>
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
                        <label for="inputDescription">Thông tin tiếng anh</label>
                        <textarea class="form-control" rows="4" name="about_en">{{ ($contact) ? $contact->about_en : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Thời gian làm việc</label>
                        <input type="text" id="inputName" class="form-control" name="timework_en" value="{{ ($contact) ? $contact->timework_en : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Địa chỉ tiếng anh</label>
                        <textarea class="form-control" rows="4" id="address_en" name="address_en">{{ ($contact) ? $contact->address_en : '' }}</textarea>
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
                        <label for="inputDescription">Thông tin</label>
                        <textarea class="form-control" rows="4" name="about_jp">{{ ($contact) ? $contact->about_jp : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Thời gian làm việc</label>
                        <input type="text" id="inputName" class="form-control" name="timework_jp" value="{{ ($contact) ? $contact->timework_jp : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Địa chỉ</label>
                        <textarea class="form-control" rows="4" id="address_jp" name="address_jp">{{ ($contact) ? $contact->address_jp : '' }}</textarea>
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
                        <label for="inputDescription">Thông tin</label>
                        <textarea class="form-control" rows="4" name="about_kr">{{ ($contact) ? $contact->about_kr : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Thời gian làm việc</label>
                        <input type="text" id="inputName" class="form-control" name="timework_kr" value="{{ ($contact) ? $contact->timework__kr : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Địa chỉ</label>
                        <textarea class="form-control" rows="4" id="address_kr" name="address_kr">{{ ($contact) ? $contact->address_kr : '' }}</textarea>
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
{{--    <script>         --}}
{{--        let back = () =>{--}}
{{--            history.back();--}}
{{--        }--}}
{{--        CKEDITOR.ClassicEditor.create(document.getElementById("address_vi"), {--}}
{{--            <?php echo $text; ?>--}}
{{--        });--}}
{{--        CKEDITOR.ClassicEditor.create(document.getElementById("address_en"), {--}}
{{--            <?php echo $text; ?>--}}
{{--        });--}}
{{--        CKEDITOR.ClassicEditor.create(document.getElementById("address_jp"), {--}}
{{--            <?php echo $text; ?>--}}
{{--        });--}}
{{--        CKEDITOR.ClassicEditor.create(document.getElementById("address_kr"), {--}}
{{--            <?php echo $text; ?>--}}
{{--        });--}}
{{--    </script>--}}
@endsection
