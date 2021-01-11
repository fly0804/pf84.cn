<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit89dcf8f45a929b809b9fb6503bbc43d1
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'think\\composer\\' => 15,
            'think\\' => 6,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'T' => 
        array (
            'Tencent\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'think\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-installer/src',
        ),
        'think\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-image/src',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application',
        ),
        'Tencent\\' => 
        array (
            0 => __DIR__ . '/..' . '/tencent/tls-sig-api/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit89dcf8f45a929b809b9fb6503bbc43d1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit89dcf8f45a929b809b9fb6503bbc43d1::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit89dcf8f45a929b809b9fb6503bbc43d1::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}