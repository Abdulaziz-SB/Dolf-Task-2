<?php

class Dbh {
    private $servername;
    private $username;
    private $pwd;
    private $dbname;

    protected function connect(){
        $this->servername = 'localhost';
        $this->username = 'root'; // Cliparo
        $this->pwd = '';// 778899Cliparo
        $this->dbname = 'cliparo';

        $conn = new mysqli($this->servername, $this->username, $this->pwd, $this->dbname);
        return $conn;
    }
}