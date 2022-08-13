<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;

class Logout {

    public function index() {

        $securityService = new Security();
        
        \session_unset();
        \session_destroy();
        Header('Location: index.php');
    }
}