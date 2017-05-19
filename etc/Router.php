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

/**
 * Class Router
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Router
{
    /** @var array */
    protected $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->loadRoutes();
    }

    /**
     * Load every routes.
     */
    public function loadRoutes()
    {
        $this->routes = require __DIR__.'/config/routes.php';
    }

    /**
     *
     *
     * @return mixed
     */
    public function dispatch()
    {
        foreach ($this->routes as $route) {
            dump($route);
            switch ($route) {
                case $route['path'] === $_SERVER['REQUEST_URI']:
                    $class = clone $route['action'];
                    return $class;
                    break;
            }
        }
    }
}
