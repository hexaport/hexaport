<?php
declare(strict_types=1);

namespace Hexaport\Support;

use ArrayAccess;
use Psr\Container\ContainerInterface as PsrContainer;

/**
 * Class Proxy
 *
 * @package Hexaport\Support
 */
class Proxy implements ContainerInterface
{
    /**
     * @var \Psr\Container\ContainerInterface
     */
    protected PsrContainer $target;

    /**
     * Proxy constructor.
     *
     * @param  \Psr\Container\ContainerInterface  $target
     */
    public function __construct(PsrContainer $target)
    {
        $this->target = $target;
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function has($id): bool
    {
        return $this->target->has($id);
    }

    /**
     * @param  string  $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->target->get($key);
    }

    /**
     * @param  string  $id
     * @param  mixed  $value
     * @return void
     */
    public function set($id, $value): void
    {
        if ($this->target instanceof ArrayAccess) {
            $this->target->offsetSet($id, $value);
        } else {
            $this->target->{$id} = $value;
        }
    }
}
