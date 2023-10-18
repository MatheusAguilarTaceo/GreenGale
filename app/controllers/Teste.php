<?php

namespace app\controllers;

class Teste{
    public function index(){
        return [
            'views' => 'teste.php',
            'data' => [
                'title-menu' => 'Teste| Greengale',
                'title-page' => 'Teste de saida',
                'css' => ''
            ]
        ];
    }
}