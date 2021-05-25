<?php

namespace Gavan4eg\SendTelegram;

use Illuminate\Support\ServiceProvider;

class SendTelegramServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'gavan4eg');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'gavan4eg');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/sendtelegram.php', 'sendtelegram');

        // Register the service the package provides.
        $this->app->singleton('sendtelegram', function ($app) {
            return new SendTelegram;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['sendtelegram'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/sendtelegram.php' => config_path('sendtelegram.php'),
        ], 'sendtelegram.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/gavan4eg'),
        ], 'sendtelegram.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/gavan4eg'),
        ], 'sendtelegram.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/gavan4eg'),
        ], 'sendtelegram.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
