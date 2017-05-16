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
use Symfony\Component\Finder\Finder;

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
        $this->loadServices();
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
        $this->loadActions();
        $this->loadResponders();
        $this->loadManagers();
        $this->loadServices();

        if ($this->router instanceof Router) {
            return;
        }
        $this->router = new Router();

        if (!empty($this->parameters)) {
            return;
        }
        $this->parameters = require __DIR__ . '/config/parameters.php';
    }

    /**
     * Allow to load every Actions registered into the Action folder.
     *
     * @throws \ReflectionException
     */
    public function loadActions()
    {
        $finder = new Finder();
        try {
            $finder->in(__DIR__.'../src/Action')->files()->name('*Action.php');
        } catch(\InvalidArgumentException $e) {
            $e->getMessage();
        }

        foreach ($finder as $file) {
            $class = new \ReflectionClass($file->getFilename());
            $args = $class->getConstructor()->getParameters();

            foreach ($args as $parameter) {
                if (array_key_exists($parameter, $this->responders)) {
                    $argument = new $this->responders[$parameter];
                    $this->actions[$class->getName()] = $class->newInstanceArgs($argument);
                }
            }
        }
    }

    public function loadResponders()
    {
        $finder = new Finder();
        try {
            $finder->in(__DIR__.'../src/Responders')->files()->name('*Responder.php');
        } catch(\InvalidArgumentException $e) {
            $e->getMessage();
        }
    }

    public function loadManagers()
    {
        $finder = new Finder();
        try {
            $finder->in(__DIR__.'../src/Managers')->files()->name('*Manager.php');
        } catch(\InvalidArgumentException $e) {
            $e->getMessage();
        }
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

    /**
     * Allow to handle the actual request.
     */
    public function handleRequest()
    {
        $this->router->dispatch();
    }
}
