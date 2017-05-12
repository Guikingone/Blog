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
     * Load every routes.
     */
    public function loadRoutes()
    {
        $this->routes = require __DIR__.'./config/routes.php';
    }

    /**
     * Dispatch the response as asked by the request.
     *
     * @return mixed
     */
    public function dispatch()
    {
        foreach ($this->routes as $route) {
            switch ($_SERVER['REQUEST_URI']) {
                case $_SERVER['REQUEST_URI'] === $route['path']:
                    return new $route['action'];
                    break;
            }
        }
    }
}
