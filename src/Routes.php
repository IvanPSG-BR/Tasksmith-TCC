<?php
namespace App;

class Routes {
    private static $web_routes = [
        '/' => [
            "GET" => 'HomeController@page',
            "POST" => ''
            ],
        '/login' => [
            "GET" => 'AuthController@login_page',
            "POST" => 'AuthController@login_process'
            ],
        '/logout' => [
            "GET" => '',
            "POST" => 'AuthController@logout_process'
        ],
        '/signup' => [
            "GET" => 'AuthController@signup_page',
            "POST" => 'AuthController@signup_process'
        ],
        '/removeaccount' => [
            "GET" => '',
            "POST" => 'AuthController@removeaccount_process'
        ],
        '/game' => [
            "GET" => 'GameController@taskboard_page',
            "POST" => 'GameController@game_process'
        ],
        '/game/task-board' => [
            "GET" => 'GameController@taskboard_page',
            "POST" => 'GameController@game_process'
        ],
        '/game/task-forge' => [
            "GET" => 'GameController@taskforge_page',
            "POST" => 'GameController@game_process'
        ]
    ];

    public static function web_routes(): array {
        return self::$web_routes;
    }
}