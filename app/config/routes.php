<?php

$routes[""] = array(
    "rota"=>"/", 
    "controller"=>"Pages", 
    "metodo"=>"index"
);

$routes["login"] = array(
    "rota" => "/login",
    "controller" => "Auth",
    "metodo" => "login"
);

$routes["profile"] = array(
    "rota"=>"/profile", 
    "controller"=>"Pages", 
    "metodo"=>"profile"
);

$routes["logout"] = array(
    "rota" => "/logout",
    "controller" => "Auth",
    "metodo" => "logout"
);