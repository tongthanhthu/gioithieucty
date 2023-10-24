<?php

use App\Http\Controllers\Client\RecruitmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\HomepageController;
use App\Http\Controllers\Client\IntroduceController;

Route::get('/', [HomepageController::class, 'index'])->name('index');
Route::get('lang/{lang}', [HomepageController::class, 'change'])->name('changeLang');
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'generate'])->name('sitemap');
Route::get('/search', [HomepageController::class, 'search'])->name('search');
Route::group(
    ['prefix' => 'tin-tuc', 'as' => 'tintuc.'],
    function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/{slug}.html', [NewsController::class, 'detail'])->name('detail');
        // Route::get('/tag/{tag}', [NewsController::class, 'index'])->name('tag');
        Route::post('/search-news', [NewsController::class, 'searchNew'])->name('searchNew');
    }
);

Route::group(
    ['prefix' => 'san-pham', 'as' => 'sanpham.'],
    function () {
        Route::get('/', [ProductController::class, 'index'])->name('list');
        Route::get('/{slug}.html', [ProductController::class, 'get'])->name('detail');
        Route::get('/search-product', [ProductController::class, 'searchProduct'])->name('searchProduct');
    }
);

Route::group(
    ['prefix' => 'lien-he', 'as' => 'lienhe.'],
    function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::post('/send-mail', [ContactController::class, 'sendMail'])->name('sendMail');
        Route::post('/receiver-mail', [ContactController::class, 'receiveMail'])->name('receiveMail');
    }
);

Route::group(
    ['prefix' => 'gioi-thieu', 'as' => 'gioithieu.'],
    function () {
        Route::get('/', [IntroduceController::class, 'index'])->name('index');
        Route::get('/{slug}.html', [IntroduceController::class, 'detail'])->name('detail');
    }
);

Route::group(
    ['prefix' => 'tuyen-dung', 'as' => 'tuyendung.'],
    function () {
        Route::get('/', [RecruitmentController::class, 'list'])->name('index');
        Route::get('/{slug}.html', [RecruitmentController::class, 'detail'])->name('detail');
        Route::post('/send-mail', [RecruitmentController::class, 'sendMail'])->name('sendmail');
    }
);

include('routeLang.php');