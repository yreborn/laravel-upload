<?php
namespace Yreborn\LaravelUpload\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array aliUpload(string $local_path, string $oss_path)
 * @method static array qnUpload(string $local_path, string $oss_path)
 * @method static array txUpload(string $local_path, string $oss_path)
 * Class Upload
 * @package Yreborn\LaravelUpload\Facades
 */
class Upload extends Facade
{

    protected static function getFacadeAccessor()
    {
        //注意这里的Facade名称需与Provider中注册的单例命名一致
        return 'upload';
    }

}