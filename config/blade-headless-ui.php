<?php

use WallaceMaxters\BladeHeadlessUi\ThemeBuilder;

$shadow  = 'shadow';
$rounded = 'rounded';
$duration = 'duration-200';

return [

    'namespace' => 'ui',

    'ui' => [

        'container' => [
            'base' => 'px-5 lg:px-0 max-w-6xl mx-auto'
        ],

        'button' => ThemeBuilder::make()
            ->base(['px-5 py-3 duration-500', $rounded])
            ->theme('default', 'bg-neutral-200 text-neutral-600')
            ->theme('blue', 'bg-blue-400 hover:bg-blue-600 text-white')
            ->toArray(),

        'input' => ThemeBuilder::make()
            ->base('w-full border-b-2 px-6 text-lg py-3 border-zinc-300 inline-flex')
            ->theme('blue', 'bg-blue-400 hover:bg-blue-600 text-white')
            ->toArray(),

        'textarea' => ThemeBuilder::make()
            ->base('w-full border-b-2 px-6 text-lg py-3 border-zinc-300 inline-flex placeholder:font-sans')
            ->theme('blue', 'bg-blue-400 hover:bg-blue-600 text-white')
            ->toArray(),


        'avatar'    => [
            'base' => ['rounded-full aspect-square bg-neutral-200 flex items-center justify-center overflow-hidden', $shadow],
            'image' => 'h-full w-full object-cover object-center'
        ],


        'section' => [
            'base' => 'py-12 lg:py-20'
        ],

        'card' => ThemeBuilder::make()
            ->base(['p-4', $shadow, $rounded])
            ->theme('none', [])
            ->theme('default', 'bg-white dark:bg-neutral-800')
            ->theme('blue', 'bg-blue-500 text-white')
            ->toArray(),

    ]
];
