<?php
declare(strict_types=1);

namespace Hexaport\Support\Co;

use ArrayObject;
use Psr\Container\ContainerInterface;

/**
 * Class Container
 *
 * @package Hexaport\Support
 */
class Container extends ArrayObject implements ContainerInterface
{
    /**
     * The container's shared instances.
     *
     * @var object[]
     */
    protected $instances = [];

    /**
     * Container constructor.
     *
     * @param  array  $instances
     */
    public function __construct(array $instances = [])
    {
        parent::__construct($instances, static::ARRAY_AS_PROPS);
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function has($id)
    {
        return $this->offsetExists($id);
    }

    /**
     * @param  string  $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * @param  mixed  $id
     * @param  mixed  $value
     * @return void
     */
    public function set($id, $value): void
    {
        $this->offsetSet($id, $value);
    }
}
