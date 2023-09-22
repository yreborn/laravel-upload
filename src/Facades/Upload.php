<?php
namespace Yreborn\LaravelUpload\Facades;

use Illuminate\Support\Facades\Facade;

class Upload extends Facade
{

    protected static function getFacadeAccessor()
    {
        //注意这里的Facade名称需与Provider中注册的单例命名一致
        return 'upload';
    }

}