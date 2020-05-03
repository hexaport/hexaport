<?php
declare(strict_types=1);

namespace Hexaport\Service;

/**
 * Interface ServiceInterface
 *
 * @package Hexaport\Service
 */
interface ServiceInterface
{
    /**
     * @return string
     */
    public static function title(): string;

    /**
     * @return string
     */
    public static function version(): string;
}
