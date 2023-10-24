@php
    $name = Route::currentRouteName();
@endphp

<aside style="background: white ;" class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="{{ route('index') }}" class="brand-link">
        <img src="{{ asset('statics/imgs/logo.webp') }}" alt="AdminLTE Logo" class="brand-image"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="bi bi-bank"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>
                @php
                    $item = ($name == 'admin.categories.index'|| $name == 'admin.categories.add') ? 'menu-is-opening menu-open' : '';
                @endphp

                <li class="nav-item {{$item}}">
                    <a href="#" class="nav-link">
                        <i class="bi bi-bookmark-check"></i>
                        <p>
                            Danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ ($name == 'admin.categories.index') ? 'text-white' : '' }}">
                                <p>Danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.add') }}" class="nav-link {{ ($name == 'admin.categories.add') ? 'text-white' : '' }}">
                                <p>Thêm danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @php
                    $item = ($name == 'admin.products.index'|| $name == 'admin.products.add') ? 'menu-is-opening menu-open' : '';
                @endphp
                <li class="nav-item {{$item}}">
                    <a href="#" class="nav-link">
                        <i class="bi bi-cpu"></i>
                        <p>
                            Sản Phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}" class="nav-link">
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.add') }}" class="nav-link">
                                <p>Thêm sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.imageLibrary') }}" class="nav-link">
                                <p>Hình ảnh sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @php
                    $item = ($name == 'admin.posts.index'|| $name == 'admin.posts.add') ? 'menu-is-opening menu-open' : '';
                @endphp
                <li class="nav-item {{$item}}">
                    <a href="#" class="nav-link">
                        <i class="bi bi-newspaper"></i>
                        <p>
                            Tin Tức
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.index') }}" class="nav-link">
                                <p>Danh mục tin tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.add') }}" class="nav-link">
                                <p>Thêm tin tức</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @php
                    $item = ($name == 'admin.main_introduce.index'|| $name == 'admin.introduce.index'|| $name == 'admin.introduce.add') ? 'menu-is-opening menu-open' : '';
                @endphp
                <li class="nav-item {{$item}}">
                    <a href="#" class="nav-link">
                        <i class="bi bi-file-earmark-check"></i>
                        <p>
                            Giới Thiệu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.main_introduce.index') }}" class="nav-link">
                                <p>Giới Thiệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.introduce.index') }}" class="nav-link">
                                <p>Danh mục giới thiệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.introduce.add') }}" class="nav-link">
                                <p>Thêm giới thiệu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                        <i class="bi bi-person-lines-fill"></i>
                        <p>Liên Hệ</p>
                    </a>
                </li>

                @php
                    $item = ($name == 'admin.menus.index'|| $name == 'admin.menus.add') ? 'menu-is-opening menu-open' : '';
                @endphp
                <li class="nav-item {{$item}}">
                    <a href="#" class="nav-link">
                        <i class="bi bi-list"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.menus.index') }}" class="nav-link">
                                <p>Danh Sách menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.menus.create') }}" class="nav-link">
                                <p>Thêm menu</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @php
                    $item = ($name == 'admin.recruitments.index'|| $name == 'admin.benefits.index'|| $name == 'admin.curriculum_vitaes.index'
                    || $name == 'admin.job_category.index') ? 'menu-is-opening menu-open' : '';
                @endphp
                <li class="nav-item {{$item}}">
                    <a href="#" class="nav-link">
                        <i class="bi bi-file-earmark-person"></i>
                        <p>
                            Tuyển dụng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.recruitments.index') }}" class="nav-link">
                                <p>Tin tuyển dụng</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.benefits.index') }}" class="nav-link">
                                <p>Các phúc lợi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.curriculum_vitaes.index') }}" class="nav-link">
                                <p>Hồ sơ ứng tuyển</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.job_category.index') }}" class="nav-link">
                                <p>Vị trí tuyển dụng</p>
                            </a>
                        </li>
                    </ul>
                </li>


                @php
                    $item = ($name == 'admin.company.ceo.index'|| $name == 'admin.social_media.index'|| $name == 'admin.company.histories.index'
                    || $name == 'admin.partner.index'|| $name == 'admin.factory_data.index'|| $name == 'admin.choose_us.index') ? 'menu-is-opening menu-open' : '';
                @endphp
                <li class="nav-item {{$item}}">
                    <a href="#" class="nav-link">
                        <i class="bi bi-building"></i>
                        <p>
                            Công ty
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.company.ceo.index') }}" class="nav-link">
                                <p>Người điều hành và phát triển</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.social_media.index') }}" class="nav-link">
                                <p>Mạng xã hội</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.company.histories.index') }}" class="nav-link">
                                <p>Quá trình hình thành và phát triển</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.partner.index') }}" class="nav-link">
                                <p>Đối tác</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.factory_data.index') }}" class="nav-link">
                                <p>Số liệu nhà máy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.choose_us.index') }}" class="nav-link">
                                <p>Tại sao chọn chúng tôi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @php
                    $item = ($name == 'admin.comment_fb.index'|| $name == 'admin.comment_fb.text') ? 'menu-is-opening menu-open' : '';
                @endphp
                <li class="nav-item {{$item}}">
                    <a href="#" class="nav-link">
                        <i class="bi bi-chat-left-text"></i>
                        <p>
                            Quản lý Bình luận Facebook
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.comment_fb.index') }}" class="nav-link">
                                <p>Cài đặt AppID</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://developers.Facebook.com/tools/comments" target="_blank" class="nav-link">
                                <p>Quản lý bình luận</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.comment_fb.text')}}" class="nav-link">
                                <p>Hướng dẫn cài đặt</p>
                            </a>
                        </li>
                    </ul>
                </li>


                @php
                    $item = ($name == 'admin.banners.index'|| $name == 'admin.logos.index'|| $name == 'admin.seocontent.index'
                    || $name == 'admin.receive_mail.index' || $name == 'admin.error.index') ? 'menu-is-opening menu-open' : '';
                @endphp
                <li class="nav-item {{$item}}">
                    <a href="#" class="nav-link">
                        <i class="bi bi-gear"></i>
                        <p>
                            Thiết lập hệ thống
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.banners.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.logos.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Logo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.seocontent.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Seo Content</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.receive_mail.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Danh sách mail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.error.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.lybary_image.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Thư viện ảnh</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>

<style>
.nav-treeview{
    padding-left: 20px !important;
}

.nav-link {
    color: black !important;
}
.nav-link.text-red,.nav-sidebar>.nav-item.menu-is-opening.menu-open > .nav-link {
    color: #fb2b3e !important;
} 

.nav-link:hover {
    color: red !important
}
.brand-link {
    border-bottom: 1px solid #dee2e6 !important;
    border-right: 1px solid #eff0f2 !important;
    color: black !important
}
</style>
<script>
    $(document).ready(function () {
        const pathName = $(location).attr('pathname');
        const host = $(location).attr('origin');
        const currentURL = host + pathName;
        const arrUrl = []
        const listURL = $('.nav-sidebar').find('a');
        listURL.each(function (i, e) {
            if ($(e).attr('href') == currentURL) {
                $(this).addClass('text-red');
            }

        })
        $('.collapse-item').click(function (e) {
            var icon = $(this).find(".icon");
            icon.toggleClass("bi-chevron-down bi-chevron-right");
            e.preventDefault();
        })
    });
</script>