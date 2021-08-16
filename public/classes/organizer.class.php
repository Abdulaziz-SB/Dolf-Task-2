<?php
// organizer model
// require_once './dbh.class.php';
// try {
    include_once './dbh.class.php';
// }catch (Exception $e){
    
// }

class Organizer extends Dbh {
    private $db;

    public function __construct() {
        $this->db = $this->connect();
    }

    public function ShowEvents($organizerId){
        $sql = 'SELECT * FROM event WHERE user_id= ?';
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
        }
        mysqli_stmt_bind_param($stmt, 'i', $organizerId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_stmt_num_rows($stmt) > 0){
            return $result;
        }else{
            return false;
        }
    }
    public function OrganizerEvents($id){
        $sql = 'SELECT * FROM event WHERE user_id = '.$id. ' ORDER BY `event`.`id` DESC';
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    public function AddNewEvent($data){
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt, 'INSERT INTO event (user_id, name, type_id, price, available, date, about, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')){
            return false;
        }else{
            // insert
            mysqli_stmt_bind_param($stmt, 'isiiisss', $data['userId'], $data['name'], $data['type'], $data['price'], $data['available'], $data['date'], $data['about'], $data['img']);
            mysqli_stmt_execute($stmt);
            return true;
        }
    }
    public function getEventTypeId($type) {
        $sql = 'SELECT * FROM sport WHERE name= ?';
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
        }
        mysqli_stmt_bind_param($stmt, 's', $type);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_stmt_num_rows($stmt) > 0 || $row = mysqli_fetch_assoc($result)){
            return $row;
        }else{
            return false;
        }
    }
}