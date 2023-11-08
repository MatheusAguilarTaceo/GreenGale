<?php
return [
    'POST'=> [
        '/login?redirect=[a-zA-Z0-9%]+' => 'Login@store',
        '/register' => 'Register@create',
        '/aviator/table' => 'Aviator@tableFilter',
        '/aviator/graphic-all' => 'Aviator@graphicFilterAll',
        '/aviator/graphic-by' => 'Aviator@graphicFilterBy',
        '/aviator/candle-rare' => 'Aviator@candleRareFilter',
        '/aviator/data-controller' => 'Aviator@dataController',  
        '/account' => 'Account@editData'
         
    ],
    'GET' =>[
        '/' => 'Home@index',    
        '/user/[a-z0-9]+' => 'User@index', // talvez eu reutilize isto
        '/register' => 'Register@index',
        '/resend-email-confirmation' => 'Register@resendEmail',
        '/login?redirect=[a-zA-Z0-9%]+' => 'Login@index',
        '/logout' => 'Login@logout',
        '/account' => 'Account@index',
        '/aviator' => 'Aviator@index',
        '/aviator/[a-z]+' => 'Aviator@show', // talvez eu reutilize isto
        '/plan' => 'Plan@index',
        '/plan?selected=basic' => 'Plan@basic',
        '/plan?selected=medium' => 'Plan@medium',
        '/plan?selected=high' => 'Plan@high',
        '/?key=[a-z0-9]+' => 'Register@emailConfirmation',
        '/privacy-policy' => 'Document@privacyPolicy',
        '/terms-of-use' => 'Document@termsOfUse',
        '/teste' => 'Teste@index'
    ]
];