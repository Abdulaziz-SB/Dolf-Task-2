<?php

// require_once './dbh.class.php';
// require_once('../../classes/dbh.class.php');
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
    public function GetOrganizer($organizer){
        $sql = 'SELECT * FROM user WHERE id= ?';
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
        }
        mysqli_stmt_bind_param($stmt, 'i', $organizer);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_stmt_num_rows($stmt) > 0 || $row = mysqli_fetch_assoc($result)){
            return $row;
        }else{
            return false;
        }
    }
    public function GetEvent($event){
        $sql = 'SELECT * FROM event WHERE id= ?';
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
        }
        mysqli_stmt_bind_param($stmt, 'i', $event);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_stmt_num_rows($stmt) > 0 || $row = mysqli_fetch_assoc($result)){
            return $row;
        }else{
            return false;
        }
    }
    public function ShowMyReservedEvents($userId){
        $sql = 'SELECT event_id, reservation.user_id, reservation.price, payment_method, event.date, event.name as event_name, event.img, sport.name as sport_name FROM reservation INNER JOIN event ON event_id=event.id INNER JOIN sport ON event.type_id=sport.id Where reservation.user_id ='.$userId;
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    public function GetMyReservedEvents($userId){
        $sql = 'SELECT event_id, user_id FROM reservation WHERE user_id = '.$userId;
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
}