<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf5aa55c6b2dbe71a8e7bb69a2983351e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Patryck\\ApiErro\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Patryck\\ApiErro\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf5aa55c6b2dbe71a8e7bb69a2983351e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf5aa55c6b2dbe71a8e7bb69a2983351e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf5aa55c6b2dbe71a8e7bb69a2983351e::$classMap;

        }, null, ClassLoader::class);
    }
}