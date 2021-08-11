<?php

require_once './dbh.class.php';
// event model 
class Event extends Dbh {
    private $db;


    public function __construct() {
        $this->db = $this->connect();
    }

    public function ViewEvents(){
        $sql = 'SELECT * FROM event';
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
}