<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6824f6380820a776b68d1e35702dc1d4
{
    public static $files = array (
        '908ac39441ad9a3aa223cb9c32ec041d' => __DIR__ . '/../..' . '/app/router/router.php',
        '49c92330d0dd196c85b743dccab9fa49' => __DIR__ . '/../..' . '/app/core/controller.php',
        '24098bd71619ab8442e16d15eeecc4f9' => __DIR__ . '/../..' . '/app/helpers/constantes.php',
        'd538625698c3fd4ddab3881ea4d72ccd' => __DIR__ . '/../..' . '/app/helpers/flash.php',
        'b76db9d0c775eefd1f5a6bc2d0f80545' => __DIR__ . '/../..' . '/app/helpers/redirect.php',
        '3dc310cd0a35800592d6ffd4493cd19e' => __DIR__ . '/../..' . '/app/helpers/sessions.php',
        '2cc073fa285373802f9bf9eadf23191d' => __DIR__ . '/../..' . '/app/helpers/validate.php',
        'eb8aa912ff95de5d18447cecc1d053e9' => __DIR__ . '/../..' . '/app/helpers/table.php',
        '4654ec7f0cc8b19e1f8221a0ba617115' => __DIR__ . '/../..' . '/app/database/connect.php',
        'e657ef5a0940a2d2e8a2e423f87b6206' => __DIR__ . '/../..' . '/app/database/fetch.php',
        '672240fa1a263e26bf92a8db5ce29a46' => __DIR__ . '/../..' . '/app/database/insert.php',
    );

    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'app\\controllers\\Account' => __DIR__ . '/../..' . '/app/controllers/Account.php',
        'app\\controllers\\Aviator' => __DIR__ . '/../..' . '/app/controllers/Aviator.php',
        'app\\controllers\\Home' => __DIR__ . '/../..' . '/app/controllers/Home.php',
        'app\\controllers\\Login' => __DIR__ . '/../..' . '/app/controllers/Login.php',
        'app\\controllers\\Register' => __DIR__ . '/../..' . '/app/controllers/Register.php',
        'app\\controllers\\User' => __DIR__ . '/../..' . '/app/controllers/User.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6824f6380820a776b68d1e35702dc1d4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6824f6380820a776b68d1e35702dc1d4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6824f6380820a776b68d1e35702dc1d4::$classMap;

        }, null, ClassLoader::class);
    }
}
