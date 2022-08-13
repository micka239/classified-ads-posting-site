<?php
session_start();

ini_set('display_errors','On');
ini_set('error_reporting', E_ALL);


use Levelup\App\Controllers\Home;
use Levelup\App\Controllers\AboutUs;
use Levelup\App\Controllers\Contact;
use Levelup\App\Controllers\Register;
use Levelup\App\Controllers\Login;
use Levelup\App\Controllers\Logout;
use Levelup\App\Controllers\CreateAd;
use Levelup\App\Controllers\SingleAd;
use Levelup\App\Controllers\DeleteAd;
use Levelup\App\Services\Calculator;
use Levelup\App\Services\Auth\Security;
use Levelup\App\Exceptions\DatabaseException;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;


require 'vendor/autoload.php';

$logger = new Logger('mali_oglasi');
$logger->pushHandler(new StreamHandler(__DIR__.'/my_app.log', Logger::ERROR));

try {

//prevent empty page error
if(!isset($_GET['page'])) {
    $_GET['page'] = 'home';
}

//routing
switch($_GET['page']) {

    case "about-us":
        $page = new AboutUs();
        $page->index();
        break;

    case "single-ad":
        $page = new SingleAd();
        $page->index();
        break;

    case "delete-ad":
        $page = new DeleteAd();
        $page->index();
        break;

    case "login":
        $page = new Login();

        if(count($_POST) == 0) {
            // display login form
            $page->index();  
        } else {
            // login user & redirect to home
            $page->loginUser();
        }            
        break;

    case "create-ad":
            $page = new CreateAd();

            if(count($_POST) == 0) {
                // display create ad form
                $page->index();  
            } else {
                // store ad into the DB
                $page->storeAd();
            }            
            break;

    case "logout":
            $page = new Logout();
            $page->index();
            break;


    case "contact":
        
        $page = new Contact();

        if(count($_POST) == 0) {
             $page->index();
         } else {
             $page->sendMsg();
            }
        break;


    case "register":
        $page = new Register();

        if(count($_POST) == 0) {

            $page->index();

        } else {

            $page->storeUser();
        }
        break;

    case "filter":
            $page = new Home();
            $page->filter();
            break;
    default:
        $page = new Home();
        $page->index();

    }
} catch(DatabaseException $exception) {

    $logger->emergency($exception->getMessage());
    $page = new Home();
    $page->showDatabaseError($exception->getMessage());      

} catch(\Exception $exception) {

    $logger->error($exception->getMessage());
    $page = new Home();
    $page->showError($exception->getMessage());    

}


