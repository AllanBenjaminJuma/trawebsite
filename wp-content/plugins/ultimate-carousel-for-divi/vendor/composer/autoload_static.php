<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1dc366355014679c464f81a9c66db09e
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPT_Ultimate_Divi_Carousel\\' => 27,
            'WPT\\UltimateDiviCarousel\\' => 25,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPT_Ultimate_Divi_Carousel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes/modules',
        ),
        'WPT\\UltimateDiviCarousel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes/classes',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1dc366355014679c464f81a9c66db09e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1dc366355014679c464f81a9c66db09e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit1dc366355014679c464f81a9c66db09e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit1dc366355014679c464f81a9c66db09e::$classMap;

        }, null, ClassLoader::class);
    }
}