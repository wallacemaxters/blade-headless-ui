## Install

```bash
composer require wallacemaxters/blade-headless-ui 
```

## Usage

```bash
php artisan vendor:publish --tag=blade-headless-ui-config
```
The command above will generate a `config/blade-headless-ui.php` file.

You can modify the classes and themes definitions for all Blade Headless Ui components.

```php
return [
    // another definitions
    'button' => [
        'base' => ['your-base-button-tailwindcss-classes', 'px-5 py-2'],
        'themes' => [
            'normal'  => ['bg-zinc-200 text-black'], // this is a default theme for all components
            'primary' => ['bg-primary text-white hover:bg-black'],
            'none'    => null,
        ]
    ]
];
```


```php
<x-ui::section theme="gradient" class="text-white">
    <x-ui::container>
        <x-ui::heading.h1 class="text-center">List Items</x-ui::heading.h1>
        @foreach($items as $item)
            <x-ui::card>
                <x-ui::heading.h2 theme="bold">{{ $item->title }}</x-ui::heading.h2>
                <p>{{ $item->description }}</p>
            </x-ui::card>
        @endforeach

        <!-- theme="normal" -->
        <x-ui::button>Normal</x-ui::button>
        <x-ui::button theme="normal">Normal</x-ui::button>
        <x-ui::button theme="primary">Primary</x-ui::button>
        <x-ui::button theme="none" class="bg-red-500 text-white"></x-ui::button>
    </x-ui::container>
</x-ui::section>
```




## Others

> **Note**: By Default, this package is configured to use with [tailwindcss](https://tailwindcss.com/), but you can use any css framework or package.

