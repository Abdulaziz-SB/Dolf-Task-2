<?php
// user model
require_once './dbh.class.php';

class User extends Dbh {
    private $db;

    public function __construct() {
        $this->db = $this->connect();
    }

    // find user by email or username
    public function FindUserByEmailOrUsername($username, $email){
        $sql = 'SELECT * FROM user WHERE username = ? OR email = ?';
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
        }
        // sotre the result that we got from the database into $stmt
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        // mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_get_result($stmt);
        //check how many results we have inside $stmt
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0 || $row = mysqli_fetch_assoc($result)) {
            return $row;
        }else{
            return false;
        }
    }
    public function InsertUser($data){
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
    // login user
    public function loginUser($nameOrEmail, $pwd){
        $row = $this->FindUserByEmailOrUsername($nameOrEmail, $nameOrEmail);
        
        $hashedPassword = $row['password'];
        $passwordCheck = password_verify($pwd, $hashedPassword);
        if($passwordCheck == true){
            return $row;
        }else if($passwordCheck == false){
            return false;
        }
    }
}