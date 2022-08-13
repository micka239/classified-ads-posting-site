<?php

namespace Levelup\App\Controllers;

use Levelup\App\Models\Users;
use Levelup\App\Services\Auth\Security;

class Register {

    public function index() {

        $securityService = new Security();        

        $errors = '';

        include('src/Views/header.php');
        include('src/Views/register.php');
        include('src/Views/footer.php');
    }

    public function storeUser() {

        $securityService = new Security();        

        if(!$securityService->validatePassword()) {

            $errors = 'You have entered wrong password';

            include('src/Views/header.php');
            include('src/Views/register.php');
            include('src/Views/footer.php');     

        } else {
        
            $userData = [
                'fullName' => $_POST['fullName'],
                'username' => $_POST['username'],
                'password' => md5($_POST['password'])
            ];

            $usersModel = new Users();
            $usersModel->insert($userData);

            include('src/Views/header.php');
            include('src/Views/register-success.php');
            include('src/Views/footer.php');                 
        }

    }
}