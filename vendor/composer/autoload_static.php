<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4fbc6c449782090e0b8fae82bbc4674a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpAmqpLib\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpAmqpLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-amqplib/php-amqplib/PhpAmqpLib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4fbc6c449782090e0b8fae82bbc4674a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4fbc6c449782090e0b8fae82bbc4674a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
