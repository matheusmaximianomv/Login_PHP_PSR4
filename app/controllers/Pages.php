<?php

namespace App\Controllers;

use App\Controllers\ControllerCore;
use App\Models\User;

class Pages extends ControllerCore {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if($this->isLogged()) {
            header("Location:".BASE_URL."/profile");
        } else {
            $this->addTitlePage("Home");
            $this->loadView("home");
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

            $this->loadView("profile");

        }
    }

    public function erro404() {
        require PATH_VIEW."404.php";
    }
}