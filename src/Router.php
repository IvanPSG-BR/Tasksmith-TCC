<?php
namespace App;

class Router {
    private static $routes = [];
    private static $web_routes = [
        '/' => 'src/Views/home/home.php',
        '/login' => 'src/Views/auth/login.php',
        '/signup' => 'src/Views/auth/signup.php',
        '/game' => 'src/Views/game/adventure.php',
        '/game/adventure' => 'src/Views/game/adventure.php',
        '/game/character' => 'src/Views/game/character.php',
        '/game/market' => 'src/Views/game/market.php',
        '/game/settings' => 'src/Views/game/settings.php',
        '/game/task-forge' => 'src/Views/game/task-forge.php',
        '/about-creator' => 'src/Views/info/about-creator.php',
        '/about-project' => 'src/Views/info/about-project.php'
    ];

    public static function get(string $path, string $action): void {
        self::$routes = [
            "GET" => [
                "path" => $path,
                "action" => $action
            ]
        ];
    }

    public static function post(string $path, string $action): void {
        self::$routes = [
            "POST" => [
                "path" => $path,
                "action" => $action
            ]
        ];
    }

    public static function put(string $path, string $action): void {
        self::$routes = [
            "PUT" => [
                "path" => $path,
                "action" => $action
            ]
        ];
    }

    public static function delete(string $path, string $action): void {
        self::$routes = [
            "DELETE" => [
                "path" => $path,
                "action" => $action
            ]
        ];
    }

    public static function routes(): array {
        return self::$routes;
    }

    public static function web_routes(): array {
        return self::$web_routes;
    }
}