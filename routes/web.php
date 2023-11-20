<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Middleware\VaoSanBay;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('hocphp');
});

// Bài 1: Views
Route::prefix('danh-muc')->group(function () {
    Route::get('/', function () {
        return view('danh-muc.index');
    });

    Route::get('/tao-danh-muc', function () {
        return view('danh-muc.create');
    });

    Route::get('/{id}', function ($id) {
        return view('danh-muc.details', ['id' => $id]);
    });
});

// Bai 2: Tương tác giữa views và controller 
Route::controller(PostController::class)->prefix('bai-viet')->group(function () {
    Route::get('/', 'layTatCaBaiViet')->name('get-posts');
    Route::get('/tao', 'getTaoBaiViet')->name('get-create');
    Route::post('/tao', 'postTaoBaiViet')->name('post-create');
    Route::get('/{id}', 'layBaiViet')->where(['id' => '[0-9]+'])->name('post-details');
});

// Bai 3: Middleware
Route::controller(PostController::class)->prefix('san-bay')->group(function () {
    Route::get('/san-a', 'vaoSanBay')->middleware([VaoSanBay::class]);
});

Route::get('/quay-ve', function () {
    return "Mua ve di ban";
});