<?php

use App\Models\ReceiveEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CeoController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\About404Controller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChooseUsController;
use App\Http\Controllers\Admin\CommentFbController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IntroduceController;
use App\Http\Controllers\Admin\FactoryDataController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\LibaryImageController;
use App\Http\Controllers\Admin\RecruitmentController;
use App\Http\Controllers\Admin\SeocontentContronller;
use App\Http\Controllers\Admin\ReceiveEmailController;
use App\Http\Controllers\Admin\CurriculumVitaeController;
use App\Http\Controllers\Admin\CompanyHistoriesController;
use App\Http\Controllers\Admin\CompanyIntroduceController;


Route::group(
    ['prefix' => 'pdh1102', 'as' => 'admin.'],
    function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::group(
            ['prefix' => 'categories', 'as' => 'categories.'],
            function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::get('/add', [CategoryController::class, 'add'])->name('add');
                Route::post('/store', [CategoryController::class, 'store'])->name('store');
                Route::post('/delete', [CategoryController::class, 'delete'])->name('delete');
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
            }
        );

        Route::group(
            ['prefix' => 'products', 'as' => 'products.'],
            function () {
                Route::get('/', [ProductController::class, 'index'])->name('index');
                Route::get('/image-library', [ProductController::class, 'imageLibrary'])->name('imageLibrary');
                Route::get('/add', [ProductController::class, 'add'])->name('add');
                Route::post('/postAdd', [ProductController::class, 'postAdd'])->name('postAdd');
                Route::get('/update/{id}', [ProductController::class, 'update'])->name('update');
                Route::post('/postUpdate/{id}', [ProductController::class, 'postUpdate'])->name('postUpdate');
                Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
            }
        );

        Route::group(
            ['prefix' => 'images', 'as' => 'images.'],
            function () {
                Route::get('/delete/{id}', [ImagesController::class, 'delete'])->name('delete');
            }
        );

        Route::group(
            ['prefix' => 'banners', 'as' => 'banners.'],
            function () {
                Route::get('/', [BannerController::class, 'index'])->name('index');
                Route::get('/add', [BannerController::class, 'add'])->name('add');
                Route::post('/postAdd', [BannerController::class, 'postAdd'])->name('postAdd');
                Route::get('/update/{id}', [BannerController::class, 'update'])->name('update');
                Route::post('/postUpdate/{id}', [BannerController::class, 'postUpdate'])->name('postUpdate');
                Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('delete');
            }
        );

        Route::group(
            ['prefix' => 'logos', 'as' => 'logos.'],
            function () {
                Route::get('/', [LogoController::class, 'index'])->name('index');
                Route::get('/add', [LogoController::class, 'add'])->name('add');
                Route::post('/postAdd', [LogoController::class, 'postAdd'])->name('postAdd');
                Route::get('/update/{id}', [LogoController::class, 'update'])->name('update');
                Route::post('/postUpdate/{id}', [LogoController::class, 'postUpdate'])->name('postUpdate');
                Route::get('/delete/{id}', [LogoController::class, 'delete'])->name('delete');
            }
        );

        Route::group(
            ['prefix' => 'curriculum_vitaes', 'as' => 'curriculum_vitaes.'],
            function () {
                Route::get('/', [CurriculumVitaeController::class, 'index'])->name('index');
                Route::get('/download/{id}', [CurriculumVitaeController::class, 'download'])->name('download');
                Route::get('/delete/{id}', [CurriculumVitaeController::class, 'delete'])->name('delete');
            }
        );

        Route::resource('menus', App\Http\Controllers\Admin\MenuController::class);
        Route::group(
            ['prefix' => 'menus', 'as' => 'menus.'],
            function () {
                Route::get('/home', [MenuController::class, 'home'])->name('home');
                Route::get('/view/{id}', [MenuController::class, 'index'])->name('view');
                Route::get('/layout/{layout}', [MenuController::class, 'layout'])->name('layout');
                Route::post('/movesort', [MenuController::class, 'moveSort'])->name('movesort');
            }
        );

        Route::group(
            ['prefix' => 'contacts', 'as' => 'contacts.'],
            function () {
                Route::get('/', [ContactController::class, 'index'])->name('index');
                Route::post('/add', [ContactController::class, 'store'])->name('add');
                Route::post('/update/{id}', [ContactController::class, 'update'])->name('update');
            }
        );

        Route::group(
            ['prefix' => 'seocontent', 'as' => 'seocontent.'],
            function () {
                Route::get('/', [SeocontentContronller::class, 'index'])->name('index');
                Route::get('/add', [SeocontentContronller::class, 'create'])->name('add');
                Route::post('/store', [SeocontentContronller::class, 'store'])->name('store');
                Route::get('/edit/{id}', [SeocontentContronller::class, 'edit'])->name('edit');
                Route::any('/update/{id}', [SeocontentContronller::class, 'update'])->name('update');
                Route::any('/destroy/{id}', [SeocontentContronller::class, 'destroy'])->name('destroy');
            }
        );

        Route::group(
            ['prefix' => 'posts', 'as' => 'posts.'],
            function () {
                Route::get('/', [PostsController::class, 'index'])->name('index');
                Route::get('/add', [PostsController::class, 'add'])->name('add');
                Route::post('/store', [PostsController::class, 'store'])->name('store');
                Route::post('/delete', [PostsController::class, 'delete'])->name('delete');
                Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [PostsController::class, 'update'])->name('update');
            }
        );

        Route::group(
            ['prefix' => 'introduce', 'as' => 'introduce.'],
            function () {
                Route::get('/', [IntroduceController::class, 'index'])->name('index');
                Route::get('/add', [IntroduceController::class, 'add'])->name('add');
                Route::post('/store', [IntroduceController::class, 'store'])->name('store');
                Route::post('/delete', [IntroduceController::class, 'delete'])->name('delete');
                Route::get('/edit/{id}', [IntroduceController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [IntroduceController::class, 'update'])->name('update');
            }
        );

        Route::group(
            ['prefix' => 'main_introduce', 'as' => 'main_introduce.'],
            function () {
                Route::get('/', [CompanyIntroduceController::class, 'index'])->name('index');
                Route::post('/store', [CompanyIntroduceController::class, 'store'])->name('store');
                Route::post('/update/{id}', [CompanyIntroduceController::class, 'update'])->name('update');
            }
        );

        Route::group(
            ['prefix' => 'benefits', 'as' => 'benefits.'],
            function () {
                Route::get('/', [BenefitController::class, 'index'])->name('index');
                Route::get('/add', [BenefitController::class, 'add'])->name('add');
                Route::post('/postAdd', [BenefitController::class, 'postAdd'])->name('postAdd');
                Route::get('/update/{id}', [BenefitController::class, 'update'])->name('update');
                Route::post('/postUpdate/{id}', [BenefitController::class, 'postUpdate'])->name('postUpdate');
                Route::get('/delete/{id}', [BenefitController::class, 'delete'])->name('delete');
                Route::get('/tutorial', [BenefitController::class, 'tutorial'])->name('tutorial');
            }
        );

        Route::group(
            ['prefix' => 'recruitments', 'as' => 'recruitments.'],
            function () {
                Route::get('/', [RecruitmentController::class, 'index'])->name('index');
                Route::get('/add', [RecruitmentController::class, 'add'])->name('add');
                Route::post('/postAdd', [RecruitmentController::class, 'postAdd'])->name('postAdd');
                Route::get('/update/{id}', [RecruitmentController::class, 'update'])->name('update');
                Route::post('/postUpdate/{id}', [RecruitmentController::class, 'postUpdate'])->name('postUpdate');
                Route::get('/delete/{id}', [RecruitmentController::class, 'delete'])->name('delete');
            }
        );

        Route::group(
            ['prefix' => 'partner', 'as' => 'partner.'],
            function () {
                Route::get('/', [PartnerController::class, 'index'])->name('index');
                Route::get('/add', [PartnerController::class, 'add'])->name('add');
                Route::post('/store', [PartnerController::class, 'store'])->name('store');
                Route::get('/delete', [PartnerController::class, 'delete'])->name('delete');
                Route::get('/edit/{id}', [PartnerController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [PartnerController::class, 'update'])->name('update');
            }
        );

        Route::group(
            ['prefix' => 'choose-us', 'as' => 'choose_us.'],
            function () {
                Route::get('/', [ChooseUsController::class, 'index'])->name('index');
                Route::post('/add', [ChooseUsController::class, 'add'])->name('add');
                Route::post('/update/{id}', [ChooseUsController::class, 'update'])->name('update');
            }
        );

        Route::group(
            ['prefix' => 'social_media', 'as' => 'social_media.'],
            function () {
                Route::get('/', [MediaController::class, 'index'])->name('index');
                Route::post('/add', [MediaController::class, 'store'])->name('add');
                Route::post('/update/{id}', [MediaController::class, 'update'])->name('update');
            }
        );

        Route::group(
            ['prefix' => 'company', 'as' => 'company.'],
            function () {
                Route::group(
                    ['prefix' => 'histories', 'as' => 'histories.'],
                    function () {
                        Route::get('/', [CompanyHistoriesController::class, 'index'])->name('index');
                        Route::get('/add', [CompanyHistoriesController::class, 'add'])->name('add');
                        Route::post('/store', [CompanyHistoriesController::class, 'store'])->name('store');
                        Route::post('/delete', [CompanyHistoriesController::class, 'delete'])->name('delete');
                        Route::get('/edit/{id}', [CompanyHistoriesController::class, 'edit'])->name('edit');
                        Route::post('/update/{id}', [CompanyHistoriesController::class, 'update'])->name('update');
                    }
                );
                Route::group(
                    ['prefix' => 'ceo', 'as' => 'ceo.'],
                    function () {
                        Route::get('/', [CeoController::class, 'index'])->name('index');
                        Route::post('/store', [CeoController::class, 'store'])->name('store');
                        Route::post('/update/{id}', [CeoController::class, 'update'])->name('update');
                    }
                );
            }
        );

        Route::group(
            ['prefix' => 'factory_data', 'as' => 'factory_data.'],
            function () {
                Route::get('/', [FactoryDataController::class, 'index'])->name('index');
                Route::post('/add', [FactoryDataController::class, 'store'])->name('add');
                Route::post('/update/{id}', [FactoryDataController::class, 'update'])->name('update');
            }
        );

        // job_category
        Route::group(
            ['prefix' => 'job_category', 'as' => 'job_category.'],
            function () {
                Route::get('/', [JobCategoryController::class, 'index'])->name('index');
                Route::get('/add', [JobCategoryController::class, 'add'])->name('add');
                Route::post('/store', [JobCategoryController::class, 'store'])->name('store');
                Route::post('/delete', [JobCategoryController::class, 'delete'])->name('delete');
                Route::get('/edit/{id}', [JobCategoryController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [JobCategoryController::class, 'update'])->name('update');
            }
        );

        // Ds mail
        Route::group(
            ['prefix' => 'receive_mail', 'as' => 'receive_mail.'],
            function () {
                Route::get('/', [ReceiveEmailController::class, 'index'])->name('index');
            }
        );

        Route::group(
            ['prefix' => 'error', 'as' => 'error.'],
            function () {
                Route::get('/', [About404Controller::class, 'index'])->name('index');
                Route::post('/add', [About404Controller::class, 'store'])->name('store');
                Route::post('/update/{id}', [About404Controller::class, 'update'])->name('update');
            }
        );

        Route::group(
            ['prefix' => 'lybary_image', 'as' => 'lybary_image.'],
            function () {
                Route::get('/', [LibaryImageController::class, 'index'])->name('index');
                Route::post('/store', [LibaryImageController::class, 'store'])->name('store');
                Route::get('/delete/{id}', [LibaryImageController::class, 'delete'])->name('delete');
            }
        );

        Route::group(
            ['prefix' => 'comment_fb', 'as' => 'comment_fb.'],
            function () {
                Route::get('/', [CommentFbController::class, 'index'])->name('index');
                Route::get('/instruct', [CommentFbController::class, 'text'])->name('text');
                Route::post('/store', [CommentFbController::class, 'store'])->name('store');
                Route::post('/update/{id}', [CommentFbController::class, 'update'])->name('update');
            }
        );
    }
);
