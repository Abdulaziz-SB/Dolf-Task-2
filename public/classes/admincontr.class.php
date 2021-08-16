<?php
include_once './admin.class.php';

class AdminContr extends Admin{
    private $db;

    public function __construct() {
        echo 'sss';
    }
}
if(isset($_POST['addeEvent'])){
    echo 'hello';
}