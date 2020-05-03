<?php
declare(strict_types=1);

namespace Hexaport\Support;

/**
 * Interface ContainerInterface
 *
 * @package Hexaport\Support
 */
interface ContainerInterface extends \Psr\Container\ContainerInterface
{
    /**
     * @param  string  $id
     * @return bool
     */
    public function has($id): bool;

    /**
     * @param  string  $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param  string  $id
     * @param  mixed  $value
     * @return void
     */
    public function set($id, $value): void;
}
