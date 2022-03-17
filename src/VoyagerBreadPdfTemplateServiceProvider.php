<?php

declare(strict_types=1);

namespace Joy\VoyagerBreadPdfTemplate;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Joy\VoyagerBreadPdfTemplate\Console\Commands\BreadPdfTemplate;
use Joy\VoyagerBreadPdfTemplate\Models\PdfTemplate as ModelsPdfTemplate;
use TCG\Voyager\Facades\Voyager;

/**
 * Class VoyagerBreadPdfTemplateServiceProvider
 *
 * @category  Package
 * @package   JoyVoyagerBreadPdfTemplate
 * @author    Ramakant Gangwar <gangwar.ramakant@gmail.com>
 * @copyright 2021 Copyright (c) Ramakant Gangwar (https://github.com/rxcod9)
 * @license   http://github.com/rxcod9/joy-voyager-bread-pdf-template/blob/main/LICENSE New BSD License
 * @link      https://github.com/rxcod9/joy-voyager-bread-pdf-template
 */
class VoyagerBreadPdfTemplateServiceProvider extends ServiceProvider
{
    /**
     * Boot
     *
     * @return void
     */
    public function boot()
    {
        Voyager::useModel('PdfTemplate', ModelsPdfTemplate::class);

        $this->registerPublishables();

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'joy-voyager-bread-pdf-template');

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'joy-voyager-bread-pdf-template');
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../routes/web.php');
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix(config('joy-voyager-bread-pdf-template.route_prefix', 'api'))
            ->middleware('api')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/voyager-bread-pdf-template.php', 'joy-voyager-bread-pdf-template');

        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }
    }

    /**
     * Register publishables.
     *
     * @return void
     */
    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__ . '/../config/voyager-bread-pdf-template.php' => config_path('joy-voyager-bread-pdf-template.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/joy-voyager-bread-pdf-template'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/joy-voyager-bread-pdf-template'),
        ], 'translations');
    }

    protected function registerCommands(): void
    {
        $this->app->singleton('command.joy.voyager.bread-pdf-template', function () {
            return new BreadPdfTemplate();
        });

        $this->commands([
            'command.joy.voyager.bread-pdf-template',
        ]);
    }
}
