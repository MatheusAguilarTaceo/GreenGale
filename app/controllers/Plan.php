<?php 

namespace app\controllers;

class Plan{
    public function index(){
        return [
            "views"=> "plan.php",
            "data"=> [
                    "title-menu"=> "Escolhas seu plano | Greengale",
                    "title-page"=> "Aviator",
                    "css" => "plan.css"
                ]
            ];
    }
}