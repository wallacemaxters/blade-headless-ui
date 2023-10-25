<?php

$shadow  = 'shadow-md';
$rounded = 'rounded-sm';
$duration = 'duration-200';

return [

    'namespace' => 'ui',

    'prefix'    => 'ui-',

    'components' => [

        'container' => [
            'base'   => 'px-5 lg:px-0 max-w-6xl mx-auto w-full',
            'variants' => [
                'normal' => []
            ]
        ],

        'button' => [
            'base'   => ['px-5 py-3 duration-500 inline-flex outline-none', $rounded],
            'variants' => [
                'normal'    => 'bg-neutral-200 text-neutral-600',
                'blue'      => 'bg-blue-400 hover:bg-blue-600 text-white',
                'primary'   => 'bg-primary hover:bg-primary text-white',
                'secondary' => 'bg-secondary hover:bg-zinc-800 text-white',
            ]
        ],

        'select' => [
            // 'wrapper' => 'relative flex items-center',
            // 'arrow'   => 'absolute right-3 pointer-events-none dark:text-white text-neutral-800',
            'base' => [
                'relative',
                'w-full',
                'border-neutral-300',
                'inline-flex items-center',
                'bg-white',
                'outline-none font-sans border-2',
                '[&>select]:appearance-none [&>select]:bg-transparent [&>select]:outline-none',
                '[&>select]:text-lg [&>select]:w-full',
                '[&>select]:border-none [&>select]:px-4 [&>select]:py-3',
                '[&>svg]:right-2 [&>svg]:absolute [&>svg]:pointer-events-none'
            ],
            'variants' => [
                'normal' => [],
                'blue'   => 'bg-blue-400 hover:bg-blue-600 text-white',
            ]
        ],

        'input' => [
            'base' => [
                'w-full border-2 px-4 py-3 border-neutral-300 inline-flex bg-white outline-none',
                'rounded-sm'
            ],
            'variants' => [
                'normal' => [],
                'blue'   => 'bg-blue-400 hover:bg-blue-600 text-white',
            ]
        ],


        'textarea' => [
            'base'   => [
                'w-full',
                'border-2 border-neutral-300',
                'px-4 py-3',
                'inline-flex',
                'placeholder:font-sans',
                'outline-none',
                $rounded
            ],
            'variants' => [
                'normal' => []
            ]
        ],


        'label' => [
            'base' => [],
            'variants' => [
                'normal'   => 'block',
                'checkbox' => 'inline-flex items-center space-x-2 cursor-pointer select-none'
            ]
        ],


        'avatar'    => [
            'base' => [
                'rounded-full',
                'aspect-square',
                'bg-neutral-200',
                'flex items-center justify-center',
                'overflow-hidden',
                $shadow
            ],
            'image'  => ['h-full w-full', 'object-cover object-center'],
            'variants' => [
                'normal' => []
            ]
        ],


        'section' => [
            'base' => 'py-12 lg:py-20',
            'variants' => [
                'normal' => []
            ]
        ],

        'card' => [
            'base' => [$shadow, $rounded, 'p-8'],
            'variants' => [
                'none'   => [],
                'normal' => ['bg-white dark:bg-neutral-800'],
                'blue'   => ['bg-blue-500 text-white'],
            ]
        ],

        'checkbox' => [
            'base' => [
                'appearance-none h-5 w-5 flex-none border-2 border-neutral-500 rotate-90',
                'rounded-sm',
                'checked:border-none',
                'checked:before:border-blue-500 checked:duration-200',
                'checked:before:h-5 checked:before:w-4',
                'checked:before:border-b-4 checked:before:border-r-4',
                'checked:before:block checked:rotate-45'
            ]
        ],


        'radio' => [
            'base' => [
                'appearance-none h-5 w-5 border-2 border-neutral-500',
                'rounded-full duration-200 checked:bg-blue-500 checked:border-transparent',
            ],
            'variants' => []
        ],

        'h1' => [
            'base' => [
                'text-6xl',
            ],
            'variants' => [
            ]
        ],
        'h2' => [
            'base' => [
                'text-5xl',
            ],
            'variants' => []
        ],

        'h3' => [
            'base' => 'text-4xl',
            'variants' => []
        ],

        'h4' => [
            'base'   => 'text-3xl',
            'variants' => []
        ],

        'h5' => [
            'base' => 'text-2xl',
            'variants' => []
        ],

        'h6' => [
            'base' => 'text-xl',
            'variants' => []
        ],

    ]
];
