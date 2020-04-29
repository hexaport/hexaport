<?php
declare(strict_types=1);

namespace Hexaport;

use Composer\Composer;
use Composer\Factory;
use Composer\IO\NullIO;
use Composer\Package\RootPackageInterface;
use ReflectionClass;

/**
 * Class Component
 *
 * @package Hexaport
 */
trait ComponentTrait
{
    /**
     * The custom component name defined by the developer.
     *
     * @var string
     */
    protected string $name;

    /**
     * The custom component version defined by the developer.
     *
     * @var string
     */
    protected string $version;

    /**
     * The base path for the component installation.
     *
     * @var string string
     */
    protected string $basePath;

    /**
     * @var \Composer\Package\RootPackageInterface
     */
    protected RootPackageInterface $package;

    /**
     * Get the name of the component.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name ?? $this->getPackage()->getName();
    }

    /**
     * Get the version of the component.
     *
     * @return string
     */
    public function version(): string
    {
        return $this->version ?? $this->getPackage()->getVersion();
    }

    /**
     * Get the base path of the component installation.
     *
     * @param  string  $path  Optionally, a path to append to the base path
     * @return string
     */
    public function basePath(string $path = ''): string
    {
        return $this->basePath.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * Guess the component path for the provider.
     *
     * @return string
     */
    public static function guessBasePath(): string
    {
        $path = (new ReflectionClass(static::class))->getFileName();

        return realpath(dirname($path, 2));
    }

    /**
     * Get the component package.
     *
     * @return \Composer\Package\RootPackageInterface
     *
     * @throws \RuntimeException
     * @throws \Composer\Json\JsonValidationException
     */
    public function getPackage(): RootPackageInterface
    {
        if (!isset($this->package)) {
            $this->package = static::createComposer($this->basePath)->getPackage();
        }

        return $this->package;
    }

    /**
     * @param  string  $basePath
     * @return \Composer\Composer
     */
    public static function createComposer(string $basePath): Composer
    {
        if (!getenv('COMPOSER_HOME')) {
            putenv('COMPOSER_HOME='.sys_get_temp_dir());
        }

        $io = new NullIO();
        $factory = new Factory();

        return $factory->createComposer($io, $basePath.DIRECTORY_SEPARATOR.'composer.json', false, $basePath, false);
    }
}
