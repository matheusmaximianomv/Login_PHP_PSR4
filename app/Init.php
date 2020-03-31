<?php
namespace App;

use App\Controllers\Pages;
use App\Controllers\Auth;

class Init {
    
    private static $init;
    private $routes;
    
    private function __construct(array $routes) {
        $this->routes = $routes;        
        $this->processarRota($this->getSegmentosDaUrl());
        
    }
    
    public static function getInstancia(array $routes): Init {
        if (!isset(self::$init)) {
            self::$init = new Init($routes);
        }
        return self::$init;
    }

    private function getSegmentosDaUrl(): string {
        $segmentosDaUrl = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        
        $segmentos = explode("/", $segmentosDaUrl);
        
        foreach ($segmentos as $key => $s) {
            if (empty($s)) {
                unset($segmentos[$key]);
            }
        }
        
        array_shift($segmentos);
        
        return implode("/", $segmentos);
    }

    private function processarRota(string $url) {
        foreach ($this->routes as $rota) {
            if ("/$url" == $rota["rota"]) {
                $nameClass = "App\\Controllers\\".$rota["controller"];
                $controller = new $nameClass;
                
                if (method_exists($controller, $rota["metodo"])) {
                    $metodo = $rota["metodo"];
                    $controller->$metodo();
                    
                    $controllerExiste = true;
                    break;
                }
            }
        }
        if (empty($controllerExiste)) {
            $this->lancar404();
        }
    }
    
    private function lancar404() {
        (new Pages())->erro404();
    }
    
    public function getRotas() {
        return $this->routes;
    }
}