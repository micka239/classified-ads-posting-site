<?php

namespace Levelup\App\Models;

use Levelup\App\Models\Users;

class Categories extends Common {

    public function getAll() {

        $sql = "SELECT * FROM `categories`;";

        $result = $this->query($sql);

        $users = [];
        while($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }

        return $users;
    }

    public function getOneById($id) {

        $sql = "SELECT * FROM `categories` WHERE id = '$id';";

        $result = $this->query($sql);

        $user = mysqli_fetch_assoc($result);

        return $user;        
    }    

}
