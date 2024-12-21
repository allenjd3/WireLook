<?php

namespace Allenjd3\WireLook\Controllers;

use Allenjd3\WireLook\WireLook;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WireLookController
{
    public function __invoke(Request $request, WireLook $wireLook): View
    {
        $previews = $wireLook->loadPreviews();
        $includes = ['keys' => array_keys($previews)];
        if ($request->has('component')) {
            $includes = [...$includes, 'componentName' => ($previews[$request->input('component')])->getComponentName()];
        }

        return view('wirelook::index', $includes);
    }
}
