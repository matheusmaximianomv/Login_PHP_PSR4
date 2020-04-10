<?php

namespace App\Controllers;

use App\Controllers\ControllerCore;
use App\Models\User;
use App\Models\BD\UserDao;

class Pages extends ControllerCore {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if($this->isLogged()) {
            header("Location:".BASE_URL."/profile");
        } else {
            $this->addTitlePage("Home - Login");
            $this->loadView("/home/head");
            $this->loadView("/home/body_sidenav");
            $this->loadView("/home/body_login");
            $this->loadView("/home/end");
            // $this->loadView("/home/home");
        }
    }

    public function signUp() {
        if($this->isLogged()) {
            header("Location:".BASE_URL."/profile");
        } else {
            $this->addTitlePage("Home - Registrar");
            $this->loadView("/home/head");
            $this->loadView("/home/body_sidenav");
            $this->loadView("/home/body_register");
            $this->loadView("/home/end");
        }
    }

    public function profile() {
        if(!$this->isLogged()) {
            header("Location:". BASE_URL . "/");
        } else {
            $user = unserialize($_SESSION["user"]);

            $this->addTitlePage("Profile - ".$user->getName());

            $this->addDataView("avatar", $user->getUrl_image());
            $this->addDataView("name", $user->getName());
            $this->addDataView("description", $user->getDescription());
            $this->addDataView("email", $user->getEmail());
            $this->addDataView("github", $user->getGithub());
            $this->addDataView("office", $user->getOffice());
            $this->addDataView("dt_birth", $user->getDt_birth());
            $this->addDataView("phone", $user->getPhone());
            $this->addDataView("city", $user->getCity());
            $this->addDataView("bio", $user->getBio());
            $this->addDataView("isAdmin", $user->getIsAdmin());

            $this->loadView("profile");

        }
    }

    public function users() {
        if(!$this->isLogged()) {
            header("Location:".BASE_URL."/");
        } else {
            $user = unserialize($_SESSION["user"]);

            if (!($user->getIsAdmin())) {
                header("Location:".BASE_URL."/profile"); 
            } else {

                $allUser = (new UserDao())->findAll($user->getEmail());

                $this->addTitlePage("Usuários Cadastrados");
                $this->addDataView("isAdmin", $user->getIsAdmin());
                $this->addDataView("users", $allUser);
                $this->loadView("users");
            }
        }
    }

    public function profileEdit() {
        if(!$this->isLogged()) {
            header("Location:". BASE_URL . "/");
        } else {
            $user = unserialize($_SESSION["user"]);

            $this->addTitlePage("Profile - ".$user->getName());

            $this->addDataView("id", $user->getId());
            $this->addDataView("avatar", $user->getUrl_image());
            $this->addDataView("name", $user->getName());
            $this->addDataView("description", $user->getDescription());
            $this->addDataView("email", $user->getEmail());
            $this->addDataView("password", $user->getPassword());
            $this->addDataView("github", $user->getGithub());
            $this->addDataView("office", $user->getOffice());
            $this->addDataView("dt_birth", $user->getDt_birth());
            $this->addDataView("phone", $user->getPhone());
            $this->addDataView("city", $user->getCity());
            $this->addDataView("bio", $user->getBio());
            $this->addDataView("isAdmin", $user->getIsAdmin());

            $this->loadView("profile-edit");
        }
    }

    public function erro404() {
        require PATH_VIEW."404.php";
    }
}