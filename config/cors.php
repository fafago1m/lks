<?php

return [

    'paths' => ['api/*', 'login','/v1/games', 'logout', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
    'http://localhost:3000',
    'http://172.25.0.1:3000',
    'http://127.0.0.1:8000/api/v1/games',
    'http://127.0.0.1:8000/api/v1/auth/signup'
],


    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];