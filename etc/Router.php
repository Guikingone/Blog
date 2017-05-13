<?php

namespace App;

/**
 * Class Router
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Router
{
    /** @var array */
    private $routes;

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
