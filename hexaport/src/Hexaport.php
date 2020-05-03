<?php
declare(strict_types=1);

namespace Hexaport;

use Hexaport\Component\Manager;

/**
 * Class Hexaport
 *
 * @package Hexaport
 */
class Hexaport
{
    /**
     * @var \Hexaport\Component\Manager
     */
    protected Manager $components;

    /**
     * Hexaport constructor.
     */
    public function __construct()
    {
        $this->components = new Manager();
    }

    /**
     * @return \Hexaport\Component\Manager
     */
    public function components(): Manager
    {
        return $this->components;
    }
}
