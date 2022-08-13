<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;
use Levelup\App\Models\Ads;
use Levelup\App\Models\Categories;

class Home {

    public function index() {

        $securityService = new Security();

        $categoriesModel = new Categories();
        $adsModel = new Ads();
        $ads = $adsModel->getActiveAds();

        include('src/Views/header.php');
        include('src/Views/home.php');
        include('src/Views/footer.php');
    }

    public function filter() {

        $securityService = new Security();

        $categoriesModel = new Categories();
        $adsModel = new Ads();
        $ads = $adsModel->getActiveAdsByCategory($_GET['category_id']);

        include('src/Views/header.php');
        include('src/Views/home.php');
        include('src/Views/footer.php');
    }

    public function showError($error) {

        $securityService = new Security();

        include('src/Views/header.php');
        include('src/Views/error.php');
        include('src/Views/footer.php');
    }


    public function showDatabaseError($error) {

        $securityService = new Security();

        include('src/Views/header.php');
        include('src/Views/database-error.php');
        include('src/Views/footer.php');
    }    
}