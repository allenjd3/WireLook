<?php

namespace Allenjd3\WireLook;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Allenjd3\WireLook\Commands\WireLookCommand;

class WireLookServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('wirelook')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_wirelook_table')
            ->hasCommand(WireLookCommand::class);
    }
}
