<?php

namespace Allenjd3\WireLook\Tests\Components;

use Livewire\Component;

class BaseComponent extends Component
{
    public string $name;

    public function render()
    {
        return view('wirelook::livewire.base');
    }
}
