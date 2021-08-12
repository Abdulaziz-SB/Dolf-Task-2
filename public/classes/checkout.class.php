<?php

class Checkout extends Dbh{
    private $db;


    public function __construct() {
        $this->db = $this->connect();
    }

    public function InsertCheckoutData($data){
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt, 'INSERT INTO user (username, email, type, password) VALUES (?, ?, ?, ?)')){
            return false;
        }else{
            // insert
            mysqli_stmt_bind_param($stmt, 'ssss', $data['username'], $data['email'], $data['userType'], $data['pwd']);
            mysqli_stmt_execute($stmt);
            return true;
        }
    }
}