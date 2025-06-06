<?php

namespace Allenjd3\WireLook;

use Allenjd3\WireLook\Commands\WireLookCommand;
use Allenjd3\WireLook\Tests\Components\BaseComponent;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WireLookServiceProvider extends PackageServiceProvider
{
    public function boot(): void
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
