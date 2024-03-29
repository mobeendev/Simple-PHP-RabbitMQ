<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4eb2d41312a684ae88830c1fe5754a66
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

    public static $classMap = array (
        'BaseFacebook' => __DIR__ . '/..' . '/facebook/php-sdk/src/base_facebook.php',
        'Facebook' => __DIR__ . '/..' . '/facebook/php-sdk/src/facebook.php',
        'FacebookApiException' => __DIR__ . '/..' . '/facebook/php-sdk/src/base_facebook.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4eb2d41312a684ae88830c1fe5754a66::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4eb2d41312a684ae88830c1fe5754a66::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4eb2d41312a684ae88830c1fe5754a66::$classMap;

        }, null, ClassLoader::class);
    }
}
