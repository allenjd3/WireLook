<?php

namespace Allenjd3\WireLook;

use Illuminate\Support\Facades\Blade;
use Transliterator;

abstract class Preview
{
    public string $componentName;

    public function getComponent(): string
    {
        return Blade::render('<livewire:is :component="$componentName" />', ['componentName' => $this->getComponentName()]);
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
}
