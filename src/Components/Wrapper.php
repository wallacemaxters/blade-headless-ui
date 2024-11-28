<?php

namespace WallaceMaxters\BlessUi\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\View\Component as ViewComponent;

class Wrapper extends ViewComponent
{
    protected array $blessUi = [];

    public array $blessUiComponentConfig = [];

    public function __construct(
        string $component,
        string $tag = 'div',
        string|array $variant = 'normal',
        bool $tagSelfClose = false
    ) {
        $this->blessUi = compact('component', 'tag', 'variant', 'tagSelfClose');

        $this->blessUiComponentConfig = Config::get('bless-ui.components.' . $component, [
            'base'     => [],
            'variants' => [],
        ]);
    }

    public function render()
    {
        return function ($data) {

            $config         = $this->blessUiComponentConfig;
            $componentClass = Config::get('bless-ui.prefix') . $this->blessUi['component'];

            $baseClasses = $config['base'] ?? null;
            $variantClasses = collect((array) $this->blessUi['variant'])->map(fn ($key) => $config['variants'][$key] ?? null)->flatten()->toArray();

            $attributes = $data['attributes']
                ->class($baseClasses)
                ->class($componentClass)
                ->class($variantClasses);


            $tag = $this->blessUi['tag'];

            if ($this->blessUi['tagSelfClose']) {
                return "<{$tag} {$attributes} />";
            }

            return "<{$tag} {$attributes}>{$data['slot']}</{$tag}>";
        };
    }
}
