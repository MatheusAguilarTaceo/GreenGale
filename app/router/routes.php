<?php
return [
    'POST'=> [
        '/login' => 'Login@store',
        '/register' => 'Register@create',
        '/aviator' => 'Aviator@tablePageFilter'
    ],
    'GET' =>[
        '/' => 'Home@index',    
        '/yser/[a-z0-9]+' => 'User@index',
        '/register' => 'Register@index',
        '/?key=[a-z0-9]+' => 'Register@emailConfirmation',
        '/login' => 'Login@index',
        '/logout' => 'Login@logout',
        '/account' => 'Account@index',
        '/aviator' => 'Aviator@index',
        '/aviator/[a-z]+' => 'Aviator@show'
    ]
    ];