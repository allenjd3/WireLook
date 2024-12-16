<?php

namespace Allenjd3\WireLook\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Livewire\LivewireServiceProvider;
use Allenjd3\WireLook\WireLookServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Allenjd3\\WireLook\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            WireLookServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('app.key', 'base64:yIAtua5VFaccXs9mbjgjkcxO+UXqPO2IInOxj2nGl9U=');

        /*
        $migration = include __DIR__.'/../database/migrations/create_wirelook_table.php.stub';
        $migration->up();
        */
    }
}
