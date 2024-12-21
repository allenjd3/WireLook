<?php

namespace Allenjd3\WireLook;

class WireLook
{
    /**
     * @return array<string, \Allenjd3\WireLook\Preview>
    */
    public function loadPreviews(): array
    {
        $previews = [];

        if ($paths = glob(config('wirelook.preview_path').'*.php')) {
            foreach ($paths as $filename) {
                $matches = [];
                preg_match('/[a-zA-Z0-9_-]+(?=\.php)/', $filename, $matches);
                if (! isset($matches[0])) {
                    continue;
                }

                $cleanedFileName = $matches[0];

                $preview = config('wirelook.preview_namespace').$cleanedFileName;

                $previewInstance = new $preview;
                assert($previewInstance instanceof Preview);
                $previews[$previewInstance->getSlug()] = $previewInstance;
            }
        }

        return $previews;
    }
}
