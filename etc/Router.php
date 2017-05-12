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

    public function __construct()
    {
        $this->loadRoutes();
    }

    public function loadRoutes()
    {
        $this->routes = require __DIR__.'./config/routes.php';

        foreach ($this->routes as $route) {
            switch ($route) {
                case $route['path'] === $_SERVER['REQUEST_URI']:
                    return new $route['action'];
                    break;
            }
        }
    }
}
