<?php

namespace Allenjd3\WireLook;

use Allenjd3\WireLook\Tests\stubs\TestPreview;

class WireLook {
    public function loadPreviews(): array
    {
        $previews = [];

        foreach (glob(config('wirelook.preview_path') . "*.php") as $filename) {
            $matches = [];
            preg_match('/[a-zA-Z0-9_-]+(?=\.php)/', $filename, $matches);
            $cleanedFileName = $matches[0];

            $preview = config('wirelook.preview_namespace') . $cleanedFileName;

            array_push($previews, new $preview);
        }

        return $previews;
    }
}
