<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\CategoryBlog;
use App\Models\Config;
use App\Models\Profession;
use App\Models\Rule;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('list_category', Category::all());
        View::share('list_category_blog', CategoryBlog::all());
        /* gioi thiei */
        View::share('introduce', Rule::where('type', 1)->first());
        /* dieu khoan dich vu */
        View::share('rules', Rule::where('type', 2)->get());
        /* thong tin lien he */
        View::share('phone', Config::where('key', 'so_dien_thoai')->first());
        View::share('mail', Config::where('key', 'mail')->first());
        View::share('facebook', Config::where('key', 'facebook')->first());
        View::share('zalo', Config::where('key', 'zalo')->first());

    }
}
