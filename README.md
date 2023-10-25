<img src="https://raw.githubusercontent.com/wallacemaxters/arts/master/bless-ui/logo.png">

# Bless UI

The Bless UI package is a set of _headless_ Blade components whose styles can be modified via a configuration file. This allows you to create styles for components previously defined by Bless UI, without worrying about their behavior.

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
| ui::checkbox   |
| ui::container  |
| ui::h1         |
| ui::h2         |
| ui::h3         |
| ui::h4         |
| ui::h5         |
| ui::h6         |
| ui::input      |
| ui::label      |
| ui::radio      |
| ui::section    |
| ui::select     |
| ui::textarea   |

## Usage

To start using Bless UI, you need to generate a configuration file. This can be done using two commands:

`php artisan vendor:publish --tag=bless-ui-config`
or

`php artisan bless-ui:make-config`

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

Following this example, the `"base"` key inside `"button"` modifies the main style of `ui::button`. However, if you want to define optional styles, you must define them within the `"variants"` key.
When you define something in `"variants"`, you can apply these styles through the `variant` property when using `ui::button`.

Example:

```php
return [
    'button' => [
        'base' => [
            'px-5 py-3 duration-500 inline-flex justify-center items-center',
        ],
        'variants' => [
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
<x-ui::button variant="normal"></x-ui::button>

<x-ui::button variant="square"></x-ui::button>
<x-ui::button variant="rounded"></x-ui::button>
<x-ui::button variant="rounded-primary"></x-ui::button>
```

## Using the CSS

If you don't want to use `config/bless-ui.php` file to define the styles of Bless UI components, you can generate the CSS File. 

Using the `php artisan bless-ui:make-tailwindcss` command, you will generate a css file with the default definitions of the Bless UI components, which you can also change as you wish.

In Bless UI, we use Tailwindcss to generate the css file.

For example:

```bash
php artisan bless-ui:make-tailwindcss
# or
php artisan bless-ui:make-tailwindcss custom-bless-ui
```

The command above will generate the `resources/css/bless-ui.css`, or `resources/css/custom-bless-ui.css` in second case.

Now, you can add this generated file to your Blade layout.

```html
<head>
    <!-- ... -->
    @vite(['resources/css/bless-ui.css'])
</head>
```

And your `vite.config.js` file:

```javascript
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/bless-ui.css'],
            refresh: true,
        }),
    ],
});

```


## Generate Custom Components

If you want to use the same structure of Bless UI to make your custom components, you can use the `bless-ui:make-component` command.

For example:

```bash
php artisan bless-ui:make-component hero
```

The file `resources/views/vendor/bless-ui/components/hero.blade.php` will be generated.

You should be insert the `'hero'` in `'components'` section of `config/bless-ui.php` file to define styles for your generated component.


