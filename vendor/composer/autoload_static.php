<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3cc6756d4cfdd6cff11146f4b1304b35
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3cc6756d4cfdd6cff11146f4b1304b35::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3cc6756d4cfdd6cff11146f4b1304b35::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}