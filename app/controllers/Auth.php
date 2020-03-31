<?php
namespace App\Controllers;

use App\Controllers\Pages;
use App\Models\User;

class Auth {
    
    public function login() {
        $email = $_POST["email"] ?? null;
        $senha = $_POST["password"] ?? null;
        
        if($email == USER_EMAIL && $senha == USER_PASS) {
            
            $user = new User("Matheus Maximiano", "Graduando no Curso de Sistemas de Informação na Faculdade Paraíso, cursando o 5º Semestre.", "https://avatars1.githubusercontent.com/u/44318510?s=460&u=7ebfbdbd878a9cdbb758a36fb81ce4eb919d0f73&v=4",$email, "matheusmaximianomv", "03/03/1999", "Desenvolvedor FullStack", "(88) 9 8873-9005", "Juazeiro do Norte", "\"Esse tem sido um dos meus mantras – foco e simplicidade. Simples pode ser mais difícil de fazer do que complexo; você tem que trabalhar duro para clarear seu pensamento a fim de torná-lo simples.\" - Steve Jobs.");

            $_SESSION['user'] = serialize($user);
            
            header("Location:" . BASE_URL . "/profile");
        } else {
            header("Location:" . BASE_URL . "/");
        }
        
    }

    public function logout() {
        session_destroy();
        header("Location:" . BASE_URL . "/");
    }
}
