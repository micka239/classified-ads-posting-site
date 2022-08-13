<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;

class AboutUs {

    public function index() {

        $securityService = new Security();

        include('src/Views/header.php');
        include('src/Views/about-us.php');
        include('src/Views/footer.php');
    }

}