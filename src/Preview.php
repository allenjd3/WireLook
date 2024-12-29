<?php

namespace Allenjd3\WireLook;

use Illuminate\Support\Facades\Blade;
use Transliterator;

abstract class Preview
{
    public string $componentName;

    /**
     * @return array<string, mixed>|array{}
     */
    public function variantDefault(): array
    {
        return [];
    }

    public function getSlug(): string
    {
        $rules = <<<'RULES'
            :: Any-Latin;
            :: NFD;
            :: [:Nonspacing Mark:] Remove;
            :: NFC;
            :: [^-[:^Punctuation:]] Remove;
            :: Lower();
            [:^L:] { [-] > ;
            [-] } [:^L:] > ;
            [-[:Separator:]]+ > '-';
        RULES;

        if ($transliterator = Transliterator::createFromRules($rules)) {
            return $transliterator->transliterate($this->getComponentName()) ?: $this->getComponentName();
        }

        return $this->getComponentName();
    }

    public function getComponentName(): string
    {
        return $this->componentName;
    }

    /**
     * @return array<int, string>
     */
    public function getVariants(): array
    {
        return array_map(
            fn ($name) => $this->extractVariantName($name),
            $this->getFunctionsStartingWithVariant(),
        );
    }

    /*
     * @return array<string, string>|array{}
     */
    public function getParams(string $variantName): array
    {
        $methodName = 'variant'. ucfirst($variantName);

        if (! method_exists($this, $methodName)) {
            return [];
        }

        return $this->$methodName();
    }

    private function extractVariantName(string $name): string
    {
        $matches = [];
        preg_match('/(?<=variant).*/', $name, $matches);

        if (isset($matches[0])) {
            return strtolower($matches[0]);
        }

        return '';
    }

    /**
     * @return array<int, string>
     */
    private function getFunctionsStartingWithVariant(): array
    {
        return array_filter(get_class_methods($this), function ($name) {
            return str_starts_with($name, 'variant');
        });
    }
}
