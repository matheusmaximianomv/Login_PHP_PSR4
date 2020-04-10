<?php
namespace App\Controllers;

use App\Controllers\ControllerCore;
use App\Models\User;
use App\Models\BD\UserDao;

class Register extends ControllerCore {
    public function __construct() {
        parent::__construct();
    }

    public function store() {
        if ($this->isLogged()) {
            header('Location:'.BASE_URL);
        } else {
            if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $url_image = $_POST['url_image'] ?? null;
                $github = $_POST['github'] ?? null;
                $dt_birth = $_POST['dt_birth'] ?? null;
                $office = $_POST['office'] ?? null;
                $phone = $_POST['phone'] ?? null;
                $city = $_POST['city'] ?? null;
                $bio = $_POST['bio'] ?? null;

                $data = array(
                    "name" => $name,
                    "description" => $description,
                    "email" => $email,
                    "password" => $password,
                    "url_image" => $url_image,
                    "github" => $github,
                    "dt_birth" => $dt_birth,
                    "office" => $office,
                    "phone" => $phone,
                    "city" => $city,
                    "bio" => $bio,
                );

                $newUser = (new UserDao())->create($data);

                if (!empty($newUser)) {
                    $user = new User($newUser['name'], $newUser['description'], $newUser['email'], $newUser['isAdmin'] ? true : false);

                    $user->setUrl_image($newUser['url_image']);
                    $user->setGithub($newUser['github']);
                    $user->setDt_birth($newUser['dt_birth']);
                    $user->setOffice($newUser['office']);
                    $user->setPhone($newUser['phone']);
                    $user->setCity($newUser['city']);
                    $user->setBio($newUser['bio']);

                    $this->login($user);
                    
                    header("Location:" . BASE_URL . "/profile");
                    return;
                } else {
                    $_SESSION[ERROR_REGISTER] = "Erro ao fazer o cadastro.";
                    header('Location:'.BASE_URL.'/register');
                }
            } else {
                $_SESSION[ERROR_REGISTER] = "Alguns campos são obrigatórios.";
                header('Location:'.BASE_URL.'/register');
            }
        }
    }
}