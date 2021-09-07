<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;
use SebastianBergmann\CodeCoverage\Report\PHP as ReportPHP;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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
    return view('welcome');
});

Route::get('/hello/{name}', function (string $name) {
    return "Hello, {$name}";
});

Route::get('/info', function () {
    return <<<php
    <!doctype html>
    <html lang='en'>
    <head>
        <meta charset="UFT-8">
        <title>Info about project</title>
    </head>
    <body>
        <h1>Info about project</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, nihil.
        </p>
    </body>
    </html>
    php;
});

Route::group(['prefix' => 'news'], function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/show/{id}', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news/show');
});

Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});
