<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9509f35b0b6708e211d4d65caa32f17c
{
    public static $files = array (
        '3937806105cc8e221b8fa8db5b70d2f2' => __DIR__ . '/..' . '/wp-cli/mustangostang-spyc/includes/functions.php',
        'be01b9b16925dcb22165c40b46681ac6' => __DIR__ . '/..' . '/wp-cli/php-cli-tools/lib/cli/cli.php',
        'e07fafea318fc2d40f3fbe4d159efb69' => __DIR__ . '/../..' . '/src/Cli.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Finder\\' => 25,
        ),
        'M' => 
        array (
            'Mustangostang\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Mustangostang\\' => 
        array (
            0 => __DIR__ . '/..' . '/wp-cli/mustangostang-spyc/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'c' => 
        array (
            'cli' => 
            array (
                0 => __DIR__ . '/..' . '/wp-cli/php-cli-tools/lib',
            ),
        ),
        'W' => 
        array (
            'WP_CLI' => 
            array (
                0 => __DIR__ . '/..' . '/wp-cli/wp-cli/php',
            ),
        ),
        'R' => 
        array (
            'Requests' => 
            array (
                0 => __DIR__ . '/..' . '/rmccue/requests/library',
            ),
        ),
        'M' => 
        array (
            'Mustache' => 
            array (
                0 => __DIR__ . '/..' . '/mustache/mustache/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9509f35b0b6708e211d4d65caa32f17c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9509f35b0b6708e211d4d65caa32f17c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit9509f35b0b6708e211d4d65caa32f17c::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
