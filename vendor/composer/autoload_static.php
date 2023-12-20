<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2f0665b0e1b74a9d7e74a6420887fa20
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'Anais\\Cea\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Anais\\Cea\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit2f0665b0e1b74a9d7e74a6420887fa20::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2f0665b0e1b74a9d7e74a6420887fa20::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2f0665b0e1b74a9d7e74a6420887fa20::$classMap;

        }, null, ClassLoader::class);
    }
}
