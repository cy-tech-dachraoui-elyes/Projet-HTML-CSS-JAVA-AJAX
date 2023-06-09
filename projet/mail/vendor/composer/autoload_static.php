<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc92b085477886587688d5b6f1c37080
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc92b085477886587688d5b6f1c37080::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc92b085477886587688d5b6f1c37080::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc92b085477886587688d5b6f1c37080::$classMap;

        }, null, ClassLoader::class);
    }
}
