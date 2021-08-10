<?php

class Dbh {
    private $servername;
    private $username;
    private $pwd;
    private $dbname;

    // public function __construct() {
    //     $this->servername = 'localhost';
    //     $this->username = 'root';
    //     $this->password = '';
    //     $this->dbname = 'cliparo';

    //     $conn = new mysqli($this->servername, $this->username, $this->pwd, $this->dbname);
    //     return $conn;
    // }
    protected function connect(){
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->pwd = '';
        $this->dbname = 'cliparo';

        $conn = new mysqli($this->servername, $this->username, $this->pwd, $this->dbname);
        return $conn;
    }
}