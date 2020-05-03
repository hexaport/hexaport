<?php
declare(strict_types=1);

namespace Hexaport\Service;

/**
 * Class Service
 *
 * @package Hexaport\Service
 */
abstract class Service implements ServiceInterface
{
    /**
     * @var string
     */
    protected static string $version = '1.0.0';
    /**
     * @return string
     */
    public static function version(): string
    {
        return static::$version;
    }
}
