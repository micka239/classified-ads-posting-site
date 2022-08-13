<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;
use Levelup\App\Models\Ads;

class SingleAd {

    public function index() {

        $securityService = new Security();

        $adsModel = new Ads();
        $ad = $adsModel->getOneById($_GET['id']);

        $ads = $adsModel->getFeaturedAdsByCategory($ad['category_id'], $ad['id']);

        include('src/Views/header.php');
        include('src/Views/single-ad.php');
        include('src/Views/footer.php');
    }

}