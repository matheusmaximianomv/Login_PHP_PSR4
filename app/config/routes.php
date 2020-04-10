<?php

$routes[""] = array(
    "rota"=>"/", 
    "controller"=>"Pages", 
    "metodo"=>"index"
);

$routes["login"] = array(
    "rota" => "/login",
    "controller" => "Auth",
    "metodo" => "signIn"
);

$routes["register"] = array(
    "rota" => "/register",
    "controller" => "Pages",
    "metodo" => "signUp"
);

$routes["signup"] = array(
    "rota" => "/signup",
    "controller" => "Register",
    "metodo" => "store"
);

$routes["profile"] = array(
    "rota"=>"/profile", 
    "controller"=>"Pages", 
    "metodo"=>"profile"
);

$routes["users"] = array(
    "rota"=>"/users", 
    "controller"=>"Pages", 
    "metodo"=>"users"
);

$routes["profile/edit"] = array(
    "rota"=>"/profile/edit", 
    "controller"=>"Pages", 
    "metodo"=>"profileEdit"
);

$routes["show"] = array(
    "rota"=>"/users/profile", 
    "controller"=>"UserController", 
    "metodo"=>"show"
);

$routes["update"] = array(
    "rota"=>"/update", 
    "controller"=>"UserController", 
    "metodo"=>"update"
);

$routes["destroy"] = array(
    "rota"=>"/destroy", 
    "controller"=>"UserController", 
    "metodo"=>"destroy"
);

$routes["logout"] = array(
    "rota" => "/logout",
    "controller" => "Auth",
    "metodo" => "destroy"
);