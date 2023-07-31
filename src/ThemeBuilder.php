<?php

namespace WallaceMaxters\BladeHeadlessUi;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\View\ComponentAttributeBag;

class ThemeBuilder
{
    protected array $base = [];

    protected array $themes = [
        'default' => []
    ];

    public static function make()
    {
        return new static;
    }

    public function base(array|string $classes)
    {
        $this->base = (array) $classes;

        return $this;
    }

    public function theme(string $name, array|string $classes)
    {
        $this->themes[$name] = (array) $classes;

        return $this;
    }

    public function toArray()
    {
        $data = [
            'base'   => $this->base,
            'themes' => $this->themes
        ];

        return $data;
    }
}
