<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5457e2db1b2d391861e445bd4f434ca
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'crojasaragonez\\UtnDb\\' => 21,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'crojasaragonez\\UtnDb\\' => 
        array (
            0 => __DIR__ . '/..' . '/crojasaragonez/utn-db/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5457e2db1b2d391861e445bd4f434ca::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5457e2db1b2d391861e445bd4f434ca::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}