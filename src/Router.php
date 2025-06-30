<?php
namespace App;

class Router {
    private static $routes = [];
    private static $web_routes = [
        '/' => 'HomeController@index',
        '/login' => 'src/Views/auth/login.php',
        '/signup' => 'src/Views/auth/signup.php',
        '/game' => 'src/Views/game/task-board.php',
        '/game/task-board' => 'src/Views/game/task-board.php',
        '/game/inventory' => 'src/Views/game/inventory.php',
        '/game/journey' => 'src/Views/game/journey.php',
        '/game/market' => 'src/Views/game/market.php',
        '/game/settings' => 'src/Views/game/settings.php',
        '/game/task-forge' => 'src/Views/game/task-forge.php'
    ];

    public static function get(string $path, string $action): void {
        self::$routes = [
            "path" => $path,
            "action" => $action,
            "method" => "GET"
        ];
    }

    public static function post(string $path, string $action): void {
        self::$routes = [
            "path" => $path,
            "action" => $action,
            "method" => "POST"
        ];
    }

    public static function put(string $path, string $action): void {
        self::$routes = [
            "path" => $path,
            "action" => $action,
            "method" => "PUT"
        ];
    }

    public static function delete(string $path, string $action): void {
        self::$routes = [
            "path" => $path,
            "action" => $action,
            "method" => "DELETE"
        ];
    }

    public static function routes(): array {
        return self::$routes;
    }

    public static function web_routes(): array {
        return self::$web_routes;
    }
}