<?php

namespace Modules\DigitalSignature\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class DigitalSignatureServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('DigitalSignature', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('DigitalSignature', 'Config/config.php') => config_path('digitalsignature.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('DigitalSignature', 'Config/config.php'), 'digitalsignature'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/digitalsignature');

        $sourcePath = module_path('DigitalSignature', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/digitalsignature';
        }, \Config::get('view.paths')), [$sourcePath]), 'digitalsignature');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/digitalsignature');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'digitalsignature');
        } else {
            $this->loadTranslationsFrom(module_path('DigitalSignature', 'Resources/lang'), 'digitalsignature');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('DigitalSignature', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
