<?php

namespace Levelup\App\Controllers;

use Levelup\App\Models\Ads;
use Levelup\App\Services\File;
use Levelup\App\Services\Auth\Security;

class DeleteAd {

    public function index() {

        $securityService = new Security();

        // make a security check - if admin is logged in
        if(!$securityService->isLoggedIn() || !$securityService->isAdmin()) {
            throw New \Exception('You do not have enough privileges to delete ad.');
        }

        $adsModel = new Ads();
        $fileService = new File();

        $ad = $adsModel->getOneById($_GET['id']);
        
        if(!empty($ad['fileName'])) {
            $fileService->delete($ad['fileName']); // delete physical file on the server
        }
        $adsModel->delete($_GET['id']);        // delete database entry

        header("Location: index.php");
    }

}