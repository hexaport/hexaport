<?php
declare(strict_types=1);

namespace Hexaport\Component;

use Composer\Package\RootPackageInterface;

/**
 * Interface ComponentInterface
 *
 * @package Hexaport\Component
 */
interface ComponentInterface
{
    /**
     * Get the name of the component.
     *
     * @return string
     */
    public function name(): string;

    /**
     * Get the version of the component.
     *
     * @return string
     */
    public function version(): string;

    /**
     * Get the base path of the component installation.
     *
     * @param  string  $path  Optionally, a path to append to the base path
     * @return string
     */
    public function basePath(string $path = ''): string;

    /**
     * Get the component package.
     *
     * @return \Composer\Package\RootPackageInterface
     *
     * @throws \RuntimeException
     * @throws \Composer\Json\JsonValidationException
     */
    public function getPackage(): RootPackageInterface;
}
