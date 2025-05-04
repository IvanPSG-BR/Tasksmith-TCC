<?php
// Definição de rotas
return [
    // Rotas da API
    'api' => [
        'GET' => [
            // Exemplo: '/users' => 'UserController@index',
        ],
        'POST' => [
            // Exemplo: '/users' => 'UserController@store',
        ],
        'PUT' => [
            // Exemplo: '/users/{id}' => 'UserController@update',
        ],
        'DELETE' => [
            // Exemplo: '/users/{id}' => 'UserController@delete',
        ]
    ],

    // Rotas de páginas
    'web' => [
        'GET' => [
            '/' => 'index.php',
            '/login' => 'Views/auth/login.php',
            '/signup' => 'Views/auth/signup.php',
            '/game' => 'Views/game/adventure.php',
            '/game/adventure' => 'Views/game/adventure.php',
            '/game/character' => 'Views/game/character-customization.php',
            '/game/market' => 'Views/game/market.php',
            '/game/settings' => 'Views/game/settings.php',
            '/game/tasks' => 'Views/game/task-forge.php',
            '/about-creator' => 'Views/info/about-creator.php',
            '/about-project' => 'Views/info/about-project.php'
        ]
    ]
];
