<?php
declare(strict_types=1);

namespace Hexaport\Laravel;

use Hexaport\ComponentInterface;
use Hexaport\ComponentTrait;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

/**
 * Class ComponentProvider
 *
 * @package Hexaport\Laravel
 */
abstract class ComponentProvider extends ServiceProvider implements ComponentInterface
{
    use ComponentTrait;

    /**
     * Create a new component provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $this->basePath = static::guessBasePath();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->registerBaseBindings();
    }

    /**
     * Register the basic bindings into the container.
     *
     * @return void
     */
    protected function registerBaseBindings()
    {
        if ($this->app->resolved($abstract = $this->name())) {
            throw new BindingResolutionException("Target component [$abstract] is already resolved.");
        }

        $this->app->instance($this->name(), $this);
        $this->app->alias($this->name(), static::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [$this->name(), static::class];
    }
}
