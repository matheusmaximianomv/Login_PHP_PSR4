<?php

namespace App\Controllers;

use App\Controllers\ControllerCore;
use App\Models\User;
use App\Models\BD\UserDao;

class UserController extends ControllerCore {

    public function __construct() {
        parent::__construct();
    }

    public function show() {
        if(!$this->isLogged()) {
            header("Location:".BASE_URL."/");
        } else {
            $user = unserialize($_SESSION["user"]);

            if (!($user->getIsAdmin())) {
                header("Location:".BASE_URL."/profile"); 
            } else {
                if (!empty($_POST['id'])) {
                    $user = (new UserDao())->findById($_POST['id']);

                    $_SESSION['user_delete'] = $_POST['id'];
    
                    $this->addTitlePage("Profile - ".$user['name']);

                    $this->addDataView("avatar", $user['url_image']);
                    $this->addDataView("name", $user['name']);
                    $this->addDataView("description", $user['description']);
                    $this->addDataView("email", $user['email']);
                    $this->addDataView("github", $user['github']);
                    $this->addDataView("office", $user['office']);
                    $this->addDataView("dt_birth", $user['dt_birth']);
                    $this->addDataView("phone", $user['phone']);
                    $this->addDataView("city", $user['city']);
                    $this->addDataView("bio", $user['bio']);

                    // header("Location:" . BASE_URL . "/users/profile/show");
                    $this->loadView("user-info");

                }
            }
        }
    }

    public function update() {
        if (!$this->isLogged()) {
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

                $user = unserialize($_SESSION["user"]);

                $updatedUser = (new UserDao())->update($user->getId(), $data);

                if (!empty($updatedUser)) {
                    $user = new User($updatedUser['name'], $updatedUser['description'], $updatedUser['email'], $updatedUser['isAdmin']);

                    $user->setUrl_image($updatedUser['url_image']);
                    $user->setGithub($updatedUser['github']);
                    $user->setDt_birth($updatedUser['dt_birth']);
                    $user->setOffice($updatedUser['office']);
                    $user->setPhone($updatedUser['phone']);
                    $user->setCity($updatedUser['city']);
                    $user->setBio($updatedUser['bio']);
                    $user->setPassword($updatedUser['password']);
                    $user->setId($updatedUser['id']);

                    $this->login($user);
                    
                    header("Location:" . BASE_URL . "/profile");
                    return;
                } else {
                    $_SESSION[MESSAGE] = "Erro ao fazer a atualização.";
                    header('Location:'.BASE_URL.'/profile/edit');
                    return;
                }
            } else {
                $_SESSION[MESSAGE] = "Alguns campos são obrigatórios.";
                header('Location:'.BASE_URL.'/profile/edit');
                return;
            }
        }
    }

    public function destroy() {
        if (!$this->isLogged()) {
            header('Location:'.BASE_URL);
        } else {

            $user = unserialize($_SESSION[SESSION_NAME]);

            if ($user->getIsAdmin()) {
                (new UserDao())->destroy($_SESSION['user_delete']);
                header('Location:'.BASE_URL.'/users');
            } else {
                header('Location:'.BASE_URL.'/users');
                return;
            }
        }
    }
}