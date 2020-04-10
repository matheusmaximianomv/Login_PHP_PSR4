<?php
namespace App\Controllers;

use App\Controllers\ControllerCore;
use App\Models\User;
use App\Models\BD\UserDao;

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

                $userDao = (new UserDao())->login($email, $password);

                if (!empty($userDao)) {
                    $user = new User($userDao['name'], $userDao['description'], $email, $userDao['isAdmin']);

                    $user->setUrl_image($userDao['url_image']);
                    $user->setGithub($userDao['github']);
                    $user->setDt_birth($userDao['dt_birth']);
                    $user->setOffice($userDao['office']);
                    $user->setPhone($userDao['phone']);
                    $user->setCity($userDao['city']);
                    $user->setBio($userDao['bio']);

                    $this->login($user);
                    
                    header("Location:" . BASE_URL . "/profile");
                    return;
                } else {
                    $_SESSION[ERROR_LOGIN] = "Credenciais Inválidas";
                    header('Location:'.BASE_URL);
                }
            } else {
                $_SESSION[ERROR_LOGIN] = "Todos os campos são obrigatórios";
                header('Location:'.BASE_URL);
            }
        }
    }

    public function destroy() {
        $this->logout();
        header("Location:" . BASE_URL . "/");
    }
}
