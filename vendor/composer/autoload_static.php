<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7e5af835906feadb2c50690ded614a65
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7e5af835906feadb2c50690ded614a65::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7e5af835906feadb2c50690ded614a65::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7e5af835906feadb2c50690ded614a65::$classMap;

        }, null, ClassLoader::class);
    }
}
