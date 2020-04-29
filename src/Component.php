<?php
declare(strict_types=1);

namespace Hexaport;

/**
 * Class Component
 *
 * @package Hexaport
 */
abstract class Component implements ComponentInterface
{
    use ComponentTrait;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $basePath
     * @return void
     */
    public function __construct(string $basePath = null)
    {
        if (is_null($basePath)) {
            $basePath = static::guessBasePath();
        }

        $this->basePath = $basePath;
    }
}
