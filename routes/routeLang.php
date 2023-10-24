<?php
use App\Http\Controllers\Client\RecruitmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\HomepageController;
use App\Http\Controllers\Client\IntroduceController;

Route::group(
    ['prefix' => 'news', 'as' => 'news.'],
    function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/{slug}.html', [NewsController::class, 'detail'])->name('detail');
        // Route::get('/tag/{tag}', [NewsController::class, 'index'])->name('tag');
        Route::post('/search-news', [NewsController::class, 'searchNew'])->name('searchNew');
    }
);

Route::group(
    ['prefix' => 'products', 'as' => 'products.'],
    function () {
        Route::get('/', [ProductController::class, 'index'])->name('list');
        Route::get('/{slug}.html', [ProductController::class, 'get'])->name('detail');
        Route::get('/search-product', [ProductController::class, 'searchProduct'])->name('searchProduct');
    }
);

Route::group(
    ['prefix' => 'contact', 'as' => 'contacts.'],
    function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::post('/send-mail', [ContactController::class, 'sendMail'])->name('sendMail');
        Route::post('/receiver-mail', [ContactController::class, 'receiveMail'])->name('receiveMail');
    }
);

Route::group(
    ['prefix' => 'about-us', 'as' => 'introduce.'],
    function () {
        Route::get('/', [IntroduceController::class, 'index'])->name('index');
        Route::get('/{slug}.html', [IntroduceController::class, 'detail'])->name('detail');
    }
);

Route::group(
    ['prefix' => 'recruitments', 'as' => 'recruitments.'],
    function () {
        Route::get('/', [RecruitmentController::class, 'list'])->name('index');
        Route::get('/{slug}.html', [RecruitmentController::class, 'detail'])->name('detail');
        Route::post('/send-mail', [RecruitmentController::class, 'sendMail'])->name('sendmail');
    }
);