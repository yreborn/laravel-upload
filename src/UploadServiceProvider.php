<?php

namespace Yreborn\LaravelUpload;

use Illuminate\Support\ServiceProvider;

class UploadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        //以单例模式注册InviteCode类实例，注意这里注册为InviteCode，后面Facade门面将以InviteCode命名，否则找不到类的实例
        $this->app->singleton('upload', function ($app) {
            return new Upload($app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //自动发布配置文件，其中invitecode参数为tag
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('config.php'),
        ]);

    }
}
