<?php

namespace App\Controllers;

class Pages {
    public function index() {
        require PATH_VIEW."home.php";
    }

    public function profile() {
        require PATH_VIEW."profile.php";
    }

    public function erro404() {
        require PATH_VIEW."404.php";
    }
}