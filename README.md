# Laravel BlessUI

The Bless UI package is a set of *headless* components whose styles can be modified via a configuration file. This allows you to create styles for components previously defined by Bless UI, without worrying about their behavior.

Bless UI works perfectly with Tailwindcss, but it is also possible to define style classes from other css frameworks.

## Install

To install Bless UI in your Laravel application, you need to use composer, as follows:

```bash
composer require wallacemaxters/bless-ui 
```

After installation, you can make the components available for use in your Blade Views through the `bless-ui:list-components` command.

## Components Avaliable


| Components     |
|----------------|
| ui::avatar     |
| ui::button     |
| ui::card       |
| ui::container  |
| ui::heading.h1 |
| ui::heading.h2 |
| ui::heading.h3 |
| ui::heading.h4 |
| ui::heading.h5 |
| ui::heading.h6 |
| ui::heading    |
| ui::input      |
| ui::label      |
| ui::section    |
| ui::select     |
| ui::textarea   |

## Usage

To start using Bless UI, you need to generate a configuration file. This can be done using two commands:

```php artisan vendor:publish --tag=bless-ui-config```
or

```php artisan blessing-ui:make-config```

**Note**: We recommend using `vendor:publish`, as it already provides the configuration file with pre-defined styles. The `bless-ui:make-config` command should be used if you want to start styling from scratch.

Both commands above will generate a `config/bless-ui.php` file.

If you are using Tailwindcss, add the `config/bless-ui.php` value to the `content` property in your `tailwind.config.js` configuration script.

```js
export default {
  content: [
    // ... another configs
    'config/bless-ui.php'
  ]
}
```

Now, you can modify the classes and themes definitions for all Bless Ui components.

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

The `button` key will be change `x-ui::button` component. 


## Calling the components

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

