<?php

namespace Levelup\App\Models;

use Levelup\App\Exceptions\DatabaseException;

class Common {

    public function dbConnect() {
        
        $connection = mysqli_connect('localhost','root','','mali_oglasi');

        if (mysqli_connect_errno()) {
            throw new DatabaseException("Failed to connect to MySQL: " . mysqli_connect_error());            
        }        

        return $connection;
    }

    protected function query($sql) {

        $connection = $this->dbConnect();

        $result = mysqli_query($connection, $sql);
        if(!$result) {
            throw new DatabaseException('Error has occurred in SQL query');
        }
        
        return $result;
    }        
}