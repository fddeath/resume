<?php

class Route
{
    private static array $routes = [];

    public static function add(string $path, string $method, $handler) {
        self::$routes[] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler
        ];
    }

    public static function display() {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        
        foreach (self::$routes as $route) {
            if ($method === $route['method'] && $url == $route['path']) {
                if (is_callable($route['handler'])) {
                    return $route['handler']();
                } else {
                    return require_once __DIR__ . '/../resources/view/' . $route['handler'] . '.php';
                }
            }
        }

        throw new Exception("404 Not Found");
    }
}