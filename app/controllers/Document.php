<?php

namespace app\controllers;

class Document{
    public function privacyPolicy(){
        return [
            'views' => 'privacy-policy.php',
            'data' => [
                'title-menu'=> 'Política de Privacidade | Greengale',
                'title-page'=> 'Política de Privacidade',
                'css' => 'privacy-policy.css',
                'js'=> 'none.js'
            ]
        ];
    }

    public function termsOfUse(){
            return [
                'views' => 'terms-of-use.php',
                'data' => [
                    'title-menu'=> 'Termos de Uso | Greengale',
                    'title-page' => 'Termos de Uso',
                    'css' => 'terms-of-use.css',
                    'js' => 'none.css'
                ]
            ];
    }
}