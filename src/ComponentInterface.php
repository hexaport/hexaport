<?php
declare(strict_types=1);

namespace Hexaport;

use Composer\Composer;
use Composer\Factory;
use Composer\IO\NullIO;
use Composer\Package\RootPackageInterface;
use ReflectionClass;

/**
 * Interface ComponentInterface
 *
 * @package Hexaport
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
