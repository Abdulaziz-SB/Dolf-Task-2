<?php
// organizer model
// require_once './dbh.class.php';
// try {
    // include_once './dbh.class.php';
// }catch (Exception $e){
    
// }

class Organizer extends Dbh {
    private $db;
    public function __construct(){
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
}