<?php

namespace Allenjd3\WireLook;

use Illuminate\Support\Facades\Blade;

abstract class Preview
{
    public function getComponent() {
        return Blade::render('<livewire:is :component="$componentName" />', ['componentName' => $this->getComponentName()]);
    }

    public function getSlug() {
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

        return \Transliterator::createFromRules($rules)
            ->transliterate( $this->getComponentName() );;
    }

    public function getComponentName()
    {
        return $this->componentName;
    }
}
