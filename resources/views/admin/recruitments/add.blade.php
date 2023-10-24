@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm tin tuyển dụng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm tin tuyển dụng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <form action="{{ route('admin.recruitments.postAdd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Tiếng Việt</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tiêu để tin</label>
                        <input type="text" name="name_vi" class="form-control">
                    </div>
                    @error('name_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="location">Địa điểm làm việc</label>
                        <input type="text" name="location_vi" class="form-control">
                    </div>
                    @error('location_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="exp">Yêu cầu kinh nghiệm</label>
                        <input type="text" name="exp_vi" class="form-control">
                    </div>
                    @error('exp_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="wage">Mức Lương</label>
                        <input type="text" name="wage_vi" class="form-control">
                    </div>
                    @error('wage_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="form">Hình thức làm việc</label>
                        <input type="text" name="form_vi" class="form-control">
                    </div>
                    @error('form_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="deadline">Hạn nộp hồ sơ</label>
                        <input type="text" name="deadline_vi" class="form-control">
                    </div>
                    @error('deadline_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="job_category">Vị trí tuyển dụng</label>
                        <select class="form-select" aria-label="Vị trí tuyển dụng" name="job_category_id">
                            @foreach($jobCategories as $jobCategory)
                                <option value="{{ $jobCategory['id'] }}">{{ $jobCategory['title_vi'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('job_category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="rank">Cấp bậc</label>
                        <input type="text" name="rank_vi" class="form-control">
                    </div>
                    @error('rank_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="welfare">Chọn phúc lợi</label>
                    <select id="tagSelect" multiple>
                        @foreach ($options as $option)
                            <option value="{{ $option->id }}">{{ $option->des_vi }}</option>
                        @endforeach
                    </select>

                    <input type="text" id="tagInput" name="welfare" readonly hidden>

                    <div class="form-group">
                        <label for="inputDescription">Mô tả công việc</label>
                        <textarea name="description_vi" id="description_vi" class="form-control" rows="4"></textarea>
                    </div>
                    @error('description_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputRequest">Yêu cầu công việc</label>
                        <textarea name="request_vi" id="request_vi" class="form-control" rows="4"></textarea>
                    </div>
                    @error('request_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputRight">Quyền lợi công việc</label>
                        <textarea name="right_vi" id="right_vi" class="form-control" rows="4"></textarea>
                    </div>
                    @error('right_vi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputOther">Thông tin khác</label>
                        <textarea name="other_vi" id="other_vi" class="form-control" rows="4"></textarea>
                    </div>
                    @error('other_vi')
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
                        <label for="name">Tiêu để tin</label>
                        <input type="text" name="name_en" class="form-control">
                    </div>
                    @error('name_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="location">Địa điểm làm việc</label>
                        <input type="text" name="location_en" class="form-control">
                    </div>
                    @error('location_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="exp">Yêu cầu kinh nghiệm</label>
                        <input type="text" name="exp_en" class="form-control">
                    </div>
                    @error('exp_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="wage">Mức Lương</label>
                        <input type="text" name="wage_en" class="form-control">
                    </div>
                    @error('wage_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="form">Hình thức làm việc</label>
                        <input type="text" name="form_en" class="form-control">
                    </div>
                    @error('form_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="deadline">Hạn nộp hồ sơ</label>
                        <input type="text" name="deadline_en" class="form-control">
                    </div>
                    @error('deadline_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="rank">Cấp bậc</label>
                        <input type="text" name="rank_en" class="form-control">
                    </div>
                    @error('rank_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputDescription">Mô tả công việc</label>
                        <textarea name="description_en" id="description_en" class="form-control" rows="4"></textarea>
                    </div>
                    @error('description_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputRequest">Yêu cầu công việc</label>
                        <textarea name="request_en" id="request_en" class="form-control" rows="4"></textarea>
                    </div>
                    @error('request_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputRight">Quyền lợi công việc</label>
                        <textarea name="right_en" id="right_en" class="form-control" rows="4"></textarea>
                    </div>
                    @error('right_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputOther">Thông tin khác</label>
                        <textarea name="other_en" id="other_en" class="form-control" rows="4"></textarea>
                    </div>
                    @error('other_en')
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
                        <label for="name">Tiêu để tin</label>
                        <input type="text" name="name_jp" class="form-control">
                    </div>
                    @error('name_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="location">Địa điểm làm việc</label>
                        <input type="text" name="location_jp" class="form-control">
                    </div>
                    @error('location_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="exp">Yêu cầu kinh nghiệm</label>
                        <input type="text" name="exp_jp" class="form-control">
                    </div>
                    @error('exp_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="wage">Mức Lương</label>
                        <input type="text" name="wage_jp" class="form-control">
                    </div>
                    @error('wage_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="form">Hình thức làm việc</label>
                        <input type="text" name="form_jp" class="form-control">
                    </div>
                    @error('form_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="deadline">Hạn nộp hồ sơ</label>
                        <input type="text" name="deadline_jp" class="form-control">
                    </div>
                    @error('deadline_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="rank">Cấp bậc</label>
                        <input type="text" name="rank_jp" class="form-control">
                    </div>
                    @error('rank_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputDescription">Mô tả công việc</label>
                        <textarea name="description_jp" id="description_jp" class="form-control" rows="4"></textarea>
                    </div>
                    @error('description_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputRequest">Yêu cầu công việc</label>
                        <textarea name="request_jp" id="request_jp" class="form-control" rows="4"></textarea>
                    </div>
                    @error('request_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputRight">Quyền lợi công việc</label>
                        <textarea name="right_jp" id="right_jp" class="form-control" rows="4"></textarea>
                    </div>
                    @error('right_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputOther">Thông tin khác</label>
                        <textarea name="other_jp" id="other_jp" class="form-control" rows="4"></textarea>
                    </div>
                    @error('other_jp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                        <label for="name">Tiêu để tin</label>
                        <input type="text" name="name_kr" class="form-control">
                    </div>
                    @error('name_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="location">Địa điểm làm việc</label>
                        <input type="text" name="location_kr" class="form-control">
                    </div>
                    @error('location_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="exp">Yêu cầu kinh nghiệm</label>
                        <input type="text" name="exp_kr" class="form-control">
                    </div>
                    @error('exp_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="wage">Mức Lương</label>
                        <input type="text" name="wage_kr" class="form-control">
                    </div>
                    @error('wage_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="form">Hình thức làm việc</label>
                        <input type="text" name="form_kr" class="form-control">
                    </div>
                    @error('form_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="deadline">Hạn nộp hồ sơ</label>
                        <input type="text" name="deadline_kr" class="form-control">
                    </div>
                    @error('deadline_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="rank">Cấp bậc</label>
                        <input type="text" name="rank_kr" class="form-control">
                    </div>
                    @error('rank_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputDescription">Mô tả công việc</label>
                        <textarea name="description_kr" id="description_kr" class="form-control" rows="4"></textarea>
                    </div>
                    @error('description_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputRequest">Yêu cầu công việc</label>
                        <textarea name="request_kr" id="request_kr" class="form-control" rows="4"></textarea>
                    </div>
                    @error('request_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputRight">Quyền lợi công việc</label>
                        <textarea name="right_kr" id="right_kr" class="form-control" rows="4"></textarea>
                    </div>
                    @error('right_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputOther">Thông tin khác</label>
                        <textarea name="other_kr" id="other_kr" class="form-control" rows="4"></textarea>
                    </div>
                    @error('other_kr')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.recruitments.index') }}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>

    @php
        $text = file_get_contents(public_path('js/ckediter5/toolbar.js'));
    @endphp

    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("description_vi"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("request_vi"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("right_vi"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("other_vi"), {
            <?php echo $text; ?>
        });




        CKEDITOR.ClassicEditor.create(document.getElementById("description_en"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("request_en"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("right_en"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("other_en"), {
            <?php echo $text; ?>
        });


        CKEDITOR.ClassicEditor.create(document.getElementById("description_jp"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("request_jp"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("right_jp"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("other_jp"), {
            <?php echo $text; ?>
        });




        CKEDITOR.ClassicEditor.create(document.getElementById("description_kr"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("request_kr"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("right_kr"), {
            <?php echo $text; ?>
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("other_kr"), {
            <?php echo $text; ?>
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#tagSelect').selectize({
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
                    $('#tagInput').val(tags);
                    console.log(tags);
                }
            });
        });
    </script>
@endsection
