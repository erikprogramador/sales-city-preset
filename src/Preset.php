<?php

namespace SalesCity\Preset;

use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;

class Preset extends LaravelPreset
{
    public static function install()
    {
        static::cleanScriptsDirectory();
        static::cleanStylesDirectory();
        static::cleanRootDirectory();
        static::updatePackages();
        static::updateRootDirectory();
        static::updateMix();
        static::updateScripts();
        static::updateStyles();
        static::ensureComponentDirectoryExists();
        static::updateComponents();
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

    public static function updateMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateScripts()
    {
        copy(__DIR__ . '/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__ . '/stubs/app.js', resource_path('js/app.js'));
    }

    public static function updateRootDirectory()
    {
        copy(__DIR__ . '/stubs/tailwind.js', base_path('tailwind.js'));
        copy(__DIR__ . '/stubs/.editorconfig', base_path('.editorconfig'));
    }

    public static function updateStyles()
    {
        copy(__DIR__ . '/stubs/app.scss', resource_path('sass/app.scss'));
    }

    public static function updateComponents()
    {
        copy(__DIR__ . '/stubs/ExampleComponent.vue', resource_path('js/components/ExampleComponent.vue'));
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
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
