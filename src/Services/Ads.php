<?php

namespace Levelup\App\Services;

class Ads {

    public function validateAdPhoneNumber($phoneNumber) {

        if(strlen($phoneNumber) < 6) {
            return false;
        }

        return true;
    }

    public function validateAdDescription($description) {

        if(strlen($description) < 20) {
            return false;
        }

        return true;
    }

}