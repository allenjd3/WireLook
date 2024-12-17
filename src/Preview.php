<?php

namespace Allenjd3\WireLook;

use Illuminate\Support\Facades\Blade;

abstract class Preview
{
    public function getComponent() {
        return Blade::render('<livewire:is :component="$componentName" />', ['componentName' => $this->getComponentName()]);
    }

    public function getComponentName()
    {
        return $this->componentName;
    }
}
