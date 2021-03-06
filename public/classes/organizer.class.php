<?php
// organizer model
// require_once './dbh.class.php';

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
    // used in organizer dashboard
    public function GetMyReservedEvents($organizerId){
        $sql = 'SELECT rt.*, ut.username, ut.id as ut_id, et.user_id as org_id, et.id as et_id from reservation rt INNER JOIN user ut ON rt.user_id = ut.id INNER JOIN event et ON et.user_id = '.$organizerId.' GROUP BY rt.user_id';
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    // get organizer revenue
    public function GetRevenue($organizerId){
        $sql = 'SELECT SUM(reservation.price) as total_revenue, event.user_id FROM `reservation` INNER JOIN event ON reservation.event_id=event.id WHERE event.user_id = '.$organizerId;
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    // return the number of pepole who attendend organizer event
    public function GetAttendentCustomers($organizerId){
        $sql = 'SELECT COUNT(reservation.id) as total_attendance FROM `reservation` INNER JOIN event ON event_id = event.id WHERE event.user_id = '.$organizerId;
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
}