<?php

namespace Allenjd3\WireLook;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Allenjd3\WireLook\Commands\WireLookCommand;
use Allenjd3\WireLook\Tests\Components\BaseComponent;
use Livewire\Livewire;

class WireLookServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        parent::boot();

        if ($this->app->environment('testing')) {
            Livewire::component('wirelook::base-component', BaseComponent::class);
        }
    }

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
