<?php

/*
 * This file is part of the Blog project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;

use Pimple\Container;

/**
 * Class Kernel
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Kernel
{
    /** @var Container */
    private $container;

    /** @var Router */
    private $router;

    /** @var array */
    private $parameters;

    /** @var array */
    private $actions;

    /** @var array */
    private $responders;

    /** @var array */
    private $services;

    /**
     * Kernel constructor.
     */
    public function __construct()
    {
        $this->build();
    }

    /**
     * Allow to build the Kernel and load the different dependencies needed
     * for the core to boot.
     */
    public function build()
    {
        if ($this->container instanceof Container) {
            return;
        }
        $this->container = new Container();

        $this->loadServices();

        if ($this->router instanceof Router) {
            return;
        }
        $this->router = new Router();

        if (!empty($this->parameters)) {
            return;
        }
        $this->parameters = require __DIR__ . '/config/parameters.php';

        if (!empty($this->services)) {
            return;
        }
        $this->services = require __DIR__.'/config/services.php';
    }

    /**
     * Allow to load all the services defined via the services.php file.
     */
    public function loadServices()
    {
        $this->services = require __DIR__ . '/config/services.php';

        // Store the services arguments.
        $arguments = [];

        foreach ($this->services as $service) {
            $class = new \ReflectionClass($service['class']);
            $args = $class->getConstructor()->getParameters();

            foreach ($service['arguments'] as $argument) {
                $arguments[] = new \ReflectionClass($argument);
            }

            foreach ($arguments as $argument) {
                $this->container[$argument->getName()] = function ($c) {
                  return new $c;
                };
            }

            if ($args) {
                foreach ($args as $arg) {

                    /** @var $argument */
                    foreach ($argument as $classes) {
                        if ($arg instanceof $classes) {
                            $reflectionClass = new $classes();
                            $this->container[$class->getName()] = function ($c) {
                                /** @var $reflectionClass */
                                return new $c($c[$reflectionClass]);
                            };
                        }
                    }
                }
            }

            $this->container[$class->getName()] = function ($c) {
                return new $c;
            };
        }

        $this->container['twig'] = function () {
            $loader = new \Twig_Loader_Filesystem([$this->parameters['views_folder']]);
            return new \Twig_Environment($loader);
        };
    }

    /**
     * Allow to handle the actual request.
     */
    public function handleRequest()
    {
        $this->router->dispatch();
    }
}
