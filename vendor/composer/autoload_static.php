<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaf4dedbc5a102bc507417a6326c78cf3
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Yreborn\\LaravelUpload\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Yreborn\\LaravelUpload\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaf4dedbc5a102bc507417a6326c78cf3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaf4dedbc5a102bc507417a6326c78cf3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaf4dedbc5a102bc507417a6326c78cf3::$classMap;

        }, null, ClassLoader::class);
    }
}
