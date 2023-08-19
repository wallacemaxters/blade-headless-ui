<?php

namespace WallaceMaxters\BladeHeadlessUi;
use Illuminate\Support\ServiceProvider;
use WallaceMaxters\BladeHeadlessUi\Commands\MakeConfig;

class BladeHeadlessUiServiceProvider extends ServiceProvider
{

    public static string $name = 'blade-headless-ui';

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
                MakeConfig::class
            ]);
        }
    }

    protected function loadConfig()
    {
        $path = __DIR__ . sprintf('/../config/%s.php', static::$name);

        $this->mergeConfigFrom($path, static::$name);

        $this->publishes([
            $path => config_path(static::$name . '.php')
        ], static::$name . '-config');

    }

    protected function loadViews()
    {
        $path = __DIR__ . '/../resources/views';

        $namespace = $this->app->config->get(static::$name . '.namespace') ?? 'ui';

        $this->loadViewsFrom($path, $namespace);

        $this->publishes([
            $path => resource_path('views/vendor/' . static::$name),
        ], static::$name . '-views');
    }
}
