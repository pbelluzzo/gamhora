<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1410fac7a5f9c5e652450ec71890a6e7
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'C' => 
        array (
            'CoffeeCode\\Router\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'CoffeeCode\\Router\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/router/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1410fac7a5f9c5e652450ec71890a6e7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1410fac7a5f9c5e652450ec71890a6e7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
