@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hướng dẫn cài đặt</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Hướng dẫn cài đặt</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h2>Cách thêm bình luận Facebook vào Bình Minh</h2>
                    <p><strong>Bước 1:</strong> Tạo app mới trên Facebook</p>
                    <p>Để thêm được bình luận Facebook vào website bạn cần lấy được app ID để quản lý bằng chính app bạn vừa
                        tạo</p>
                    <ul>
                        <li>Trở thành nhà phát triển ( deverlopers)</li>
                        <li>Truy cập <a href="https://developers.facebook.com/apps"
                                target="_blank">https://developers.facebook.com/apps</a></li>
                        <li>Chọn Add my new App => Tạo ID Ứng dụng mới => Điền thông tin đầy đủ</li>
                        <li>Nhập mã bảo mật và chọn “Gửi”</li>
                    </ul>
                    <p><strong>Bước 2:</strong> Truy cập vào trang Facebook for deverlopers. Ứng dụng của bạn đang bị
                        Facebook tắt. Hãy vào Cài đặt => Thông tin cơ bản và bật ứng dụng lên</p>
                    <p>Khi bạn gặp cửa sổ công khai ứng dụng hãy chọn Chấp nhận</p>
                    <p><strong>Bước 3:</strong> Tiếp tục chọn Thêm nền tảng</p>
                    <p><strong>Bước 4:</strong> Chọn nền tảng ứng dụng của bạn trong trường hợp bạn có website thì hãy chọn
                        trang web</p>
                    <p><strong>Bước 5:</strong> Điền URL của website và Lưu thay đổi</p>
                    <p><strong>Bước 6:</strong> Lấy mã code Facebook</p>
                    <p>Sau khi tạo ứng dụng thành công và lấy được mã từ Facebook cung cấp hãy vào Trang quản trị => Quản lý Bình luận Facebook
                        => Cài đặt AppID </p>
                    <p><strong>Bước 7:</strong> Thêm ID ứng dụng vào giao diện website Bình Minh</p>
                    <p>
                        <meta property="fb:app_id" content="{YOUR_Facebook_USER_ID}" />
                    </p>
                    <p><strong>{YOUR_Facebook_USER_ID}</strong> chính là ID ứng dụng mà bạn đã sao chép.</p>
                    <p><strong>Bước 8:</strong> Chọn Lưu</p>
                    <p>Vậy là bạn đã hoàn thành việc thêm khung bình luận Facebook vào Bình Minh.</p>
                    <p><strong>Cách quản lý bình luận Facebook trên Bình Minh</strong></p>
                    <p>Sau khi thêm được khung bình luận vào website của mình bạn cần quản lý chúng.</p>
                    <ul>
                        <li>Hãy truy cập: <a href="https://developers.Facebook.com/tools/comments"
                                target="_blank">https://developers.Facebook.com/tools/comments</a></li>
                        <li>Gõ đúng tên ứng dụng bạn đã tạo và bắt đầu quy trình xem cũng như quản lý bình luận.</li>
                        <li>Bạn có thêm người quản lý bình luận Facebook bằng cách vào Cài đặt => Người kiểm duyệt . Sau đó
                            thêm nick Facebook bạn muốn trở thành người quản lý những bình luận trên website. Cuối cùng chọn
                            Lưu là hoàn tất</li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a onclick="back()" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
    <script>
        let back = () => {
            history.back();
        }
    </script>
@endsection
