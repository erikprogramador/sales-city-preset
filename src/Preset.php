<?php

namespace SalesCity\Preset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;

class Preset extends LaravelPreset
{
    public static function install()
    {
        static::cleanScriptsDirectory();
        static::cleanStylesDirectory();
        static::cleanRootDirectory();
        static::cleanTestFiles();
        static::updatePackages();
        static::updateRootDirectory();
        static::updateMix();
        static::updateScripts();
        static::updateStyles();
        static::ensureComponentDirectoryExists();
        static::updateComponents();
        static::updateAuth();
        static::updateImages();
        static::updateTestFiles();
        static::updateHelperFiles();
        static::updateTableSeeders();
    }

    public static function cleanScriptsDirectory()
    {
        File::cleanDirectory(resource_path('js'));
    }

    public static function cleanStylesDirectory()
    {
        File::cleanDirectory(resource_path('sass'));
    }

    public static function cleanRootDirectory()
    {
        unlink(base_path('.editorconfig'));
    }

    public static function cleanTestFiles()
    {
        unlink(base_path('phpunit.xml'));
        unlink(base_path('tests/TestCase.php'));
    }

    public static function updateMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateScripts()
    {
        copy(__DIR__ . '/stubs/js/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__ . '/stubs/js/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/stubs/js/dom-work.js', resource_path('js/dom-work.js'));

        (new Filesystem)->copyDirectory(__DIR__ . '/stubs/elements', resource_path('js/elements'));
    }

    public static function updateRootDirectory()
    {
        copy(__DIR__ . '/stubs/tailwind.js', base_path('tailwind.js'));
        copy(__DIR__ . '/stubs/.editorconfig', base_path('.editorconfig'));
    }

    public static function updateStyles()
    {
        copy(__DIR__ . '/stubs/scss/app.scss', resource_path('sass/app.scss'));
    }

    public static function updateComponents()
    {
        copy(__DIR__ . '/stubs/components/ExampleComponent.vue', resource_path('js/components/ExampleComponent.vue'));
        copy(__DIR__ . '/stubs/components/Notification.vue', resource_path('js/components/Notification.vue'));
    }

    public static function updateAuth()
    {
        copy(__DIR__ . '/stubs/auth/Controllers/HomeController.php', app_path('Http/Controllers/HomeController.php'));

        file_put_contents(
            base_path('routes/web.php'),
            "Route::view('/', 'welcome')->name('welcome');\n\nAuth::routes();\n\nRoute::get('home', 'HomeController')->name('home')->middleware(['auth']);\n\n",
            FILE_APPEND
        );

        (new Filesystem)->copyDirectory(__DIR__ . '/stubs/auth/views', resource_path('views'));
    }

    public static function updateImages()
    {
        (new Filesystem)->copyDirectory(__DIR__ . '/stubs/images', public_path('images'));
    }

    public static function updateTestFiles()
    {
        copy(__DIR__ . '/stubs/tests/TestCase.php', base_path('tests/TestCase.php'));
        copy(__DIR__ . '/stubs/tests/functions.php', base_path('tests/functions.php'));
        copy(__DIR__ . '/stubs/tests/phpunit.xml', base_path('phpunit.xml'));
    }

    public static function updateHelperFiles()
    {
        copy(__DIR__ . '/stubs/helpers.php', config_path('functions.php'));
    }

    public static function updateTableSeeders()
    {
        copy(__DIR__ . '/stubs/auth/Seeders/DatabaseSeeder.php', database_path('seeds/DatabaseSeeder.php'));
        copy(__DIR__ . '/stubs/auth/Seeders/UsersTableSeeder.php', database_path('seeds/UsersTableSeeder.php'));
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
                '@mdi/font' => '^3.5.95',
                'tailwindcss' => '^0.7.4',
                'glob-all' => '^3.1.*',
                'purgecss-webpack-plugin' => '^1.4.*',
            ],
            Arr::except($packages, [
                'popper.js',
                'lodash',
                'jquery',
                'bootstrap'
            ])
        );
    }

    protected static function ensureComponentDirectoryExists()
    {
        $filesystem = new Filesystem;

        if (!$filesystem->isDirectory($directory = resource_path('js/components'))) {
            $filesystem->makeDirectory($directory, 0755, true);
        }
    }
}
