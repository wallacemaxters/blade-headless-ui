<?php

namespace WallaceMaxters\BlessUi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use WallaceMaxters\BlessUi\Commands\ListComponents;
use WallaceMaxters\BlessUi\Commands\MakeComponent;
use WallaceMaxters\BlessUi\Commands\MakeConfig;
use WallaceMaxters\BlessUi\Commands\MakeTailwindcss;
use WallaceMaxters\BlessUi\Components\Wrapper;

class BlessUiServiceProvider extends ServiceProvider
{
    public static string $name = 'bless-ui';

    public function boot()
    {
        $this->loadConfig();
        $this->loadViews();
        $this->loadCommands();
    }

    protected function loadCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeConfig::class,
                MakeTailwindcss::class,
                MakeComponent::class,
                ListComponents::class
            ]);
        }
    }

    protected function loadConfig()
    {
        $path = __DIR__ . sprintf('/../config/%s.php', static::$name);

        $this->mergeConfigFrom($path, static::$name);

        $this->publishes([
            $path => $this->app->configPath(static::configFilename())
        ], static::$name . '-config');
    }

    protected function loadViews()
    {
        $path = __DIR__ . '/../resources/views';

        $publishTarget = $this->app->resourcePath(static::componentPublishTarget());

        $namespace = $this->app->config->get(static::$name . '.namespace') ?? 'ui';

        Blade::component(Wrapper::class, 'bless-ui::wrapper');

        Blade::anonymousComponentPath($publishTarget, $namespace);
        Blade::anonymousComponentPath($path . '/components', $namespace);

        $this->publishes([
            $path => $this->app['files']->dirname($publishTarget),
        ], static::$name . '-views');

    }

    public static function configFileName(): string
    {
        return static::$name . '.php';
    }

    public static function componentPublishTarget()
    {
        return 'views/vendor/' . static::$name . '/components/';
    }
}
