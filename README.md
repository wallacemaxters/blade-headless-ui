# Laravel BlessUI

The Bless UI package is a set of _headless_ components whose styles can be modified via a configuration file. This allows you to create styles for components previously defined by Bless UI, without worrying about their behavior.

Bless UI works perfectly with Tailwindcss, but it is also possible to define style classes from other css frameworks.

## Install

To install Bless UI in your Laravel application, you need to use composer, as follows:

```bash
composer require wallacemaxters/bless-ui
```

After installation, you can make the components available for use in your Blade Views through the `bless-ui:list-components` command.

## Components Avaliable

| Components     |
| -------------- |
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

`php artisan vendor:publish --tag=bless-ui-config`
or

`php artisan blessing-ui:make-config`

**Note**: We recommend using `vendor:publish`, as it already provides the configuration file with pre-defined styles. The `bless-ui:make-config` command should be used if you want to start styling from scratch.

Both commands above will generate a `config/bless-ui.php` file.

If you are using Tailwindcss, add the `config/bless-ui.php` value to the `content` property in your `tailwind.config.js` configuration script.

```js
export default {
  // ...
  content: [
    // ... another configs
    "config/bless-ui.php",
  ],
};
```

## How it works?

This configuration file is used to define the styling classes for each Bless UI component. For example, if you want to modify the classes of the `ui::button` component, you must modify the `"button"` key defined in `config/bless-ui.php`

Following this example, the `"base"` key inside `"button"` modifies the main style of `ui::button`. However, if you want to define optional styles, you must define them within the `"themes"` key.
When you define something in `"themes"`, you can apply these styles through the `theme` property when using `ui::button`.

Example:

```php
return [
    'button' => [
        'base' => [
            'px-5 py-3 duration-500 inline-flex justify-center items-center',
        ],
        'themes' => [
            'normal'  => '',
            'square'  => 'rounded-none border-2 border-black',
            'rounded' => 'rounded-full p-12',
            'rounded-primary' => 'rounded-full p-12 bg-primary text-white hover:bg-black',
        ]
    ]
];
```

```html
<!-- both is same -->
<x-ui::button></x-ui::button>
<x-ui::button theme="normal"></x-ui::button>

<x-ui::button theme="square"></x-ui::button>
<x-ui::button theme="rounded"></x-ui::button>
<x-ui::button theme="rounded-primary"></x-ui::button>
```

