<?php

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
    private $services;

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

        if ($this->router instanceof Router) {
            return;
        }
        $this->router = new Router();

        if (!empty($this->parameters)) {
            return;
        }
        $this->parameters = require __DIR__ . './config/parameters.php';
    }

    public function loadServices()
    {
        $this->services = require __DIR__ . '/config/services.php';

        foreach ($this->services as $service) {
            $class = new \ReflectionClass($service['class']);
            $this->container[$class->getName()] = function ($c) {
                return new $c;
            };
        }

        $this->container['templating'] = function () {
            $loader = new \Twig_Loader_Filesystem([$this->parameters['views_folder']]);
            return new \Twig_Environment($loader);
        };
    }

    public function loadActions()
    {

    }
}
