<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;
use Levelup\App\Services\Email;

class Contact {

    public function index() {

        $securityService = new Security();

        $errors = '';

        include('src/Views/header.php');
        include('src/Views/contact.php');
        include('src/Views/footer.php');
    }

   
    public function sendMsg() {

        $securityService = new Security();
        
        if(!isset($_POST['message']) || empty($_POST['message'])) {

            $errors = 'Please enter message';

            include('src/Views/header.php');
            include('src/Views/contact.php');
            include('src/Views/footer.php'); 

        } else {
        
            $message = $_POST['message'];   

            // logic for email sending
            $email = new Email();
            $email->send($_POST['message']);

            include('src/Views/header.php');
            include('src/Views/contact-success.php');
            include('src/Views/footer.php');             
        }
    }


    
}