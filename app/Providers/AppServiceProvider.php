<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 外部キーを有効化
        // sqliteだけデフォルトで有効にならない
        // でもこのアプリは有効になっている。バージョンの違いかな
        if (\DB::getDriverName() === 'sqlite') {
            \DB::statement(\DB::raw('PRAGMA foreign_keys=1'));
        }
    }
}
