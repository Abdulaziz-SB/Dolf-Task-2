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

        // if(!preg_match("/^[a-zA-Z0-9]*$/", $data['user'])) u can check username string

        // validate email
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            flash('register', 'Invalid email');
            redirect('../pages/common/sign-up.php');
        }
        // check password length
        if((strlen((string)$data['pwd'])) < 6){
            flash('register', 'password is to short!!');
            redirect('../pages/common/sign-up.php');
        }
        // check radio button
        if($data['userType'] == 'Customer'){
            $data['userType'] = (string)0;
        }else{
            $data['userType'] = (string)1;
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
    public function login() {
        // sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // init data
        $data = [
            'name/email' => trim($_POST['name/email']),
            'pwd' => trim($_POST['pwd'])
        ];

        // check for username and email
        if($this->userModel->FindUserByEmailOrUsername($data['name/email'], $data['name/email'])){
            // user found
            $loggedInUser = $this->userModel->loginUser($data['name/email'], $data['pwd']);
            if($loggedInUser){
                // create session
                $this->CreateUserSession($loggedInUser);
            }else{
                flash('login', 'Password Incorrect');
                redirect('../pages/common/sign-in.php');
            }
        }else{
            flash('login', 'No user found');
            redirect('../pages/common/sign-in.php');
        }
    }

    public function CreateUserSession($user){
        $_SESSION['usersId'] = $user['id'];
        $_SESSION['usersName'] = $user['username'];
        $_SESSION['usersEmail'] = $user['email'];
        $_SESSION['usersType'] = $user['type'];
        if($user['type'] == '1'){
            redirect('../pages/organizer/index.php');
        }else{
            redirect('../pages/user/index.php');
        }
    } 
    public function logout(){
        unset($_SESSION['usersId']);
        unset($_SESSION['usersName']);
        unset($_SESSION['usersEmail']);
        session_destroy();
        redirect('../pages/user/index.php');
    }
}

$init = new UserContr;

// Ensure that user is sending a post request
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch($_POST['type']){ 
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
            redirect('../pages/user/index.php');
    }
}else{
    switch($_GET['q']){ 
        case 'logout':
            $init->logout();
            break;
        default:
            redirect('../pages/user/index.php');
    }
}
