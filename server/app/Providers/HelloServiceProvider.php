<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
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
        // コンポーザとして外部で変数を設定可能
        // View::composer(
        //     'hello.index', function($view) {
        //         $view->with('view_message', 'composer message!');
        //     }
        // );

        // コンポーザを外部で設定することも可能
        View::composer(
            // 下記のようにワイルドカード指定もできると思われる。（これで動いたから）
            // '*', 'App\Http\Composers\HelloComposer'
            'hello.index', 'App\Http\Composers\HelloComposer'
        );
    }
}
