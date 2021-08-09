<?php

require_once './user.class.php';
require_once '../helpers/session_helper.php';

class UserContr extends User{
    private $userModel;

    public function __construct() {
        $this->userModel = new User;
    }
    public function register() {
        // process form

        // sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'pwd' => trim($_POST['pwd']),
            'userType' => trim($_POST['userType'])
        ];

        // if(!preg_match("/^[a-zA-Z0-9]*$/", $data['user']))

        // validate email
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            flash('register', 'Invalid email');
            redirect('../pages/common/sign-up.php');
        }
        // check password length
        if(strlen($data['pwd'] < 6)){
            flash('register', 'password is to short!!');
            redirect('../pages/common/sign-up.php');
        }

        // users with the same email or username already exists
        if($this->userModel->FindUserByEmailOrUsername($data['username'], $data['email'])){
            flash('register', 'Username or email already taken');
            redirect('../pages/common/sign-up.php');
        }

        // passed all validation checks
        // hash password
        $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);

        // register user
        if($this->userModel->InsertUser($data)){
            redirect('../pages/common/sign-in.php');
        }else{
            die('Something went wrong');
        }
    }
}

$init = new UserContr;

// Ensure that user is sending a post request
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch($_POST['type']){ 
        case 'register':
            $init->register();
            break;
    }
}
