<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81fbf6f84e49a2d3d0048c6423622dc9
{
    public static $files = array (
        'e13863dfd52b5a72929a2ae54ddecfec' => __DIR__ . '/..' . '/agencenous/wp-reporting/src/wp-reporting.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit81fbf6f84e49a2d3d0048c6423622dc9::$classMap;

        }, null, ClassLoader::class);
    }
}