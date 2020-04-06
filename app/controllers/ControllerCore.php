<?php
namespace App\Controllers;

class ControllerCore {
    
    private const SESSION_NAME = 'user';
    private const LAST_ACCESS = 'last_access';
    
    private $dataView = array();
    private $idleLimit = 60; // seconds

    public function __construct() {
        $this->checkIdleness();
    }

    protected function loadView($nameView) {
        // Fazer isso pra quando a página for carregada essa variável de escopo poder ser acessada pela página carregada;
        $dataView = $this->dataView;
        require_once PATH_VIEW."$nameView.php"; 
    }

    /*
     * Controle de Dados das Páginas
     */
    protected function addTitlePage($title) {
        $this->dataView['titlePage'] = $title;
    }

    protected function addDataView($key, $value) {
        $this->dataView[$key] = $value;
    }
    
    /**
     * Controle de Sessão
     */
    
    protected function login($user) {
        session_regenerate_id();
        $_SESSION[self::SESSION_NAME] = serialize($user);
        $_SESSION[self::LAST_ACCESS] = time();
    }
    
    protected function logout() {
        unset($_SESSION[self::SESSION_NAME]);
        unset($_SESSION[self::LAST_ACCESS]);
        session_destroy();
    }
    
    protected function isLogged() {
        return isset($_SESSION[self::SESSION_NAME]) ? true : false;
    }
    
    private function checkIdleness() {
        if (!empty($_SESSION(self::SESSION_NAME))) {
            $idleTime = time() - $_SESSION[self::LAST_ACCESS];
            
            if ($idleTime > $this->idleLimit) {
                $this->logout();
            } else {
                $_SESSION[self::LAST_ACCESS] = time();
            }
        }
    }
}