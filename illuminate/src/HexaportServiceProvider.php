<?php
declare(strict_types=1);

namespace Hexaport\Illuminate;

use Hexaport\Hexaport;
use Illuminate\Support\ServiceProvider;

/**
 * Class ComponentProvider
 *
 * @package Hexaport\Illuminate\Support
 */
class HexaportServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Hexaport::class);
        $this->app->alias(Hexaport::class, 'hexaport');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [Hexaport::class, 'hexaport'];
    }
}
