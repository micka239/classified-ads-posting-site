<?php

namespace Levelup\App\Services\Auth;

use Levelup\App\Models\Users;
use Levelup\App\Models\LoginHistory;

class Security {

    public function login($username, $password) {
        
        $usersModel = new Users();
        $loginHistoryModel = new LoginHistory();

        $detectedUser = $usersModel->getByUsernameAndPassword($username, $password);

        // login success
        if(is_array($detectedUser)) {

            $ipAddress = $_SERVER['REMOTE_ADDR'];
            $loginHistoryModel->insert($ipAddress, $detectedUser['id']);

            return [
                'user_level' => $detectedUser['user_level']
            ];
        }

        return false;        
    }

    public function validatePassword(): bool {

        if(strlen($_POST['password']) < 6) {
            return false;
        }

        if($_POST['password'] != $_POST['passwordConfirm']) {
            return false;
        }

        return true;
    }    

    public function isLoggedIn() {

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            return true;
        } else {
            return false;
        }

    }    

    public function isAdmin() {

        if(isset($_SESSION['user_level']) && $_SESSION['user_level'] == 2) {
            return true;
        } else {
            return false;
        }

    }    

}