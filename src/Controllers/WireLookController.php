<?php

namespace Allenjd3\WireLook\Controllers;

use Allenjd3\WireLook\Preview;
use Allenjd3\WireLook\WireLook;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WireLookController
{
    /** @var array<int, Preview> */
    public array $previews;

    public function __invoke(Request $request, WireLook $wireLook): View
    {
        $validated = $request->validate([
            'component' => ['nullable', 'string'],
            'variant' => ['nullable', 'string'],
        ]);

        $this->previews = $wireLook->loadPreviews();
        $includes = ['components' => $this->generateComponentTree()];

        if ($preview = $this->searchPreviews($validated['component'] ?? 'poop')) {

            $includes = [
                ...$includes,
                'componentName' => $preview->getComponentName(),
                'props' => $preview->getParams($validated['variant'] ?? 'default'),
            ];
        }

        return view('wirelook::index', $includes);
    }

    /**
     * @return array<int, array<'slug'|'variants', string|array<int, string>>>
    */
    private function generateComponentTree(): array
    {
        $previews = $this->previews;
        return array_map(
            function(Preview $preview) {
                return ['slug' => $preview->getSlug(), 'variants' => $preview->getVariants()];
            },
            $previews,
        );
    }

    private function searchPreviews(string $componentName): ?Preview
    {
        $previews = $this->previews;

        $filteredPreviews = array_filter($previews, fn (Preview $preview) => $preview->getSlug() === $componentName);
        return array_shift($filteredPreviews);
    }
}
