<?php
return [
    'POST'=> [
        '/login' => 'Login@store',
        '/register' => 'Register@create',
        '/aviator/[a-z]+' => 'Aviator@tablePageFilter'
    ],
    'GET' =>[
        '/' => 'Home@index',    
        '/user/[a-z0-9]+' => 'User@index',
        '/register' => 'Register@index',
        '/login' => 'Login@index',
        '/logout' => 'Login@logout',
        '/account' => 'Account@index',
        '/aviator' => 'Aviator@index',
        '/aviator/[a-z]+' => 'Aviator@show'
    ]
];