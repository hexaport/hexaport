<?php
declare(strict_types=1);

namespace Hexaport\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;

/**
 * Class Plugin
 *
 * @package Hexaport\Composer
 */
class Plugin implements PluginInterface, EventSubscriberInterface
{
    /**
     * Apply plugin modifications to Composer
     *
     * @param  Composer  $composer
     * @param  IOInterface  $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        // TODO: Implement activate() method.
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     * * The method name to call (priority defaults to 0)
     * * An array composed of the method name to call and the priority
     * * An array of arrays composed of the method names to call and respective
     *   priorities, or 0 if unset
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            // PluginEvents::INIT => ['init', PHP_INT_MAX]
        ];
    }
}
