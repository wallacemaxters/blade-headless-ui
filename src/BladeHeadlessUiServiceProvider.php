<?php

namespace WallaceMaxters\BladeHeadlessUi;
use Illuminate\Support\ServiceProvider;


class BladeHeadlessUiServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadConfig();
        $this->loadViews();
    }

    protected function loadConfig()
    {
        $path = __DIR__ . '/../config/blade-headless-ui.php';

        $this->mergeConfigFrom($path, 'blade-headless-ui');

        $this->publishes([
            $path => config_path('blade-headless-ui.php')
        ]);

    }

    protected function loadViews()
    {
        $path = __DIR__ . '/../resources/views';

        $namespace = $this->app->config->get('blade-headless-ui.namespace') ?? 'bhui';

        $this->loadViewsFrom($path, $namespace);

        $this->publishes([
            $path => resource_path('views/vendor/blade-headless-ui'),
        ]);
    }
}
