<?php
namespace App\Controllers;

use App\Controllers\ControllerCore;
use App\Models\User;

class Auth extends ControllerCore{

    public function __construct() {
        parent::__construct();
    }
    
    public function signIn() {
        if ($this->isLogged()) {
            header('Location:'.BASE_URL);
        } else {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if ($email == USER_EMAIL && $password == USER_PASS) {

                    $user = new User("Matheus Maximiano", "Graduando no Curso de Sistemas de Informação na Faculdade Paraíso, cursando o 5º Semestre.", $email);

                    $user->setUrl_image("https://avatars1.githubusercontent.com/u/44318510?s=460&u=7ebfbdbd878a9cdbb758a36fb81ce4eb919d0f73&v=4");
                    $user->setGithub("matheusmaximianomv");
                    $user->setDt_birth("03/03/1999");
                    $user->setOffice("Desenvolvedor FullStack");
                    $user->setPhone("(88) 9 8873-9005");
                    $user->setCity("Juazeiro do Norte");
                    $user->setBio("\"Esse tem sido um dos meus mantras – foco e simplicidade. Simples pode ser mais difícil de fazer do que complexo; você tem que trabalhar duro para clarear seu pensamento a fim de torná-lo simples.\" - Steve Jobs.");

                    $this->login($user);
                    
                    header("Location:" . BASE_URL . "/profile");
                    return;
                } else {
                    $_SESSION[ERROR] = "Credenciais Inválidas";
                    header('Location:'.BASE_URL);
                }
            } else {
                $_SESSION[ERROR] = "Todos os campos são obrigatórios";
                header('Location:'.BASE_URL);
            }
        }
        
    }

    public function destroy() {
        $this->logout();
        header("Location:" . BASE_URL . "/");
    }
}
