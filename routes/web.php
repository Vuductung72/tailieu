<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\VerifyEmailController;

// Route::get('/admin/tyumnnfvrd', function() {
//     \DB::table('admins')->insert([
//         'name' => 'admin',
//         'email' => 'email@email.com',
//         'password' => \Hash::make('admin123'),
//         'phone' => '0123123123',
//         'role' => '1',
//     ]);
// });


/*
| admin routing group
*/
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => '/admin', 'as' => 'ad.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('config', 'ConfigController')->except('show');
    Route::resource('cms', 'CmsController')->except('show');

    Route::get('/', 'DashboardController@index')->name('index');
    Route::resource('admin', 'AdminController')->except('show');
    Route::resource('user', 'UserController')->except('show');
    Route::resource('category', 'CategoryController')->except('show');
    Route::resource('category-blog', 'CategoryBlogController')->except('show');
    Route::resource('blog', 'BlogController')->except('show');
    Route::patch('blog/propose/{blog}', 'BlogController@propose')->name('blog.propose');
    Route::resource('rule', 'RuleController')->except('show');
    Route::resource('document', 'DocumentController')->except('show');
    Route::patch('document/type/{document}', 'DocumentController@type')->name('document.type');
    Route::patch('document/new/{document}', 'DocumentController@new')->name('document.new');
    Route::delete('language/{language}', 'DocumentController@deleteLanguage')->name('language.delete');
    Route::resource('slider', 'SliderController')->except('show');
    Route::patch('slider/status/{slider}', 'SliderController@status')->name('slider.status');
    Route::resource('slider-blog', 'SliderBlogController')->except('show');
    Route::patch('slider-blog/status/{slider_blog}', 'SliderBlogController@status')->name('slider-blog.status');

    Route::get('/contact', 'ContactController@index')->name('contact.index');

    Route::resource('slider', 'SliderController')->except('show');
    Route::patch('slider/status/{slider}', 'SliderController@status')->name('slider.status');


    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::get('/login', 'Admin\LoginController@index')->name('ad.login.index');
Route::post('/login', 'Admin\LoginController@login')->name('ad.login');


/*
| user routing group
*/
Route::post('/dang-nhap', 'web\LoginController@postLogin')->name('w.login');
Route::get('/dang-ki', 'Web\LoginController@register')->name('w.register.index');
Route::post('/dang-ki', 'Web\LoginController@postRegister')->name('w.register');

Route::group(['as' => 'w.', 'namespace' => 'Web'], function () {
    /* tính năng quên mật khẩu */
    Route::get('/quen-mat-khau', 'ForgetPasswordController@forgetPassword')->name('forget_password');
    Route::put('/quen-mat-khau', 'ForgetPasswordController@postEmail')->name('post.forget_password');
    Route::get('/doi-mat-khau-moi/{user}/{token}', 'ForgetPasswordController@getPass')->name('get_pass');
    Route::put('/doi-mat-khau-moi/{user}', 'ForgetPasswordController@changePass')->name('post.verify_password');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/danh-sach-bai-viet', 'BlogController@list')->name('list_blog');
    Route::get('/danh-sach-bai-viet/{category_slug}', 'BlogController@listCategory')->name('blog_category');
    Route::get('/danh-sach-bai-viet/{category_slug}/{slug}', 'BlogController@blog')->name('blog');
    Route::get('/lien-he', 'ContactController@index')->name('contact');
    Route::post('/lien-he', 'ContactController@post')->name('post_contact');
    Route::get('/danh-sach-tai-lieu', 'DocumentController@list')->name('list_document');
    // Route::get('/danh-sach-tai-lieu/tai-lieu-moi-nhat', 'DocumentController@list')->name('list_document');
    Route::get('/danh-sach-tai-lieu/ngon-ngu/{type}', 'DocumentController@listType')->name('list_document_type');
    Route::get('/danh-sach-tai-lieu/{slug}', 'DocumentController@listCategory')->name('list_document_category');
    Route::get('/danh-sach-tai-lieu/{slug}/ngon-ngu/{type}', 'DocumentController@listCategoryType')->name('list_document_category_type');
    Route::get('/danh-sach-tai-lieu/{slug}/{document_slug}', 'DocumentController@document')->name('document');
    Route::get('/danh-sach-tai-lieu-ngon-ngu', 'DocumentController@type')->name('document_type');
    Route::get('/tim-kiem', 'DocumentController@search')->name('document_search');


    Route::middleware('userLogin')->group(function () {
        Route::get('/logout', 'LoginController@logout')->name('logout');
        Route::get('/tai-khoan', 'AccountController@index')->name('account');
        Route::post('/tai-khoan/{user}', 'AccountController@update')->name('account_update');
        Route::get('/doi-mat-khau', 'AccountController@pasword')->name('password');
        Route::post('/doi-mat-khau/{user}', 'AccountController@updatePassword')->name('password_update');
        Route::post('/binh-luan/{slug}', 'BlogController@comment')->name('blog_comment');

    });

    Route::get('/{rule_slug}', 'RuleController@index')->name('rule');


});
