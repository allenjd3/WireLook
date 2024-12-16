<?php

namespace Allenjd3\WireLook;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Allenjd3\WireLook\Commands\WireLookCommand;

class WireLookServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('wirelook')
            ->hasConfigFile()
            ->hasRoute('web')
            ->hasViews('wirelook')
            ->hasMigration('create_wirelook_table')
            ->hasCommand(WireLookCommand::class);
    }
}
