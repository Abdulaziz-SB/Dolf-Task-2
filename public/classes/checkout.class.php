<?php
// checkout model
require_once './dbh.class.php';

class Checkout extends Dbh{
    private $db;


    public function __construct() {
        $this->db = $this->connect();
    }

    public function InsertCheckoutData($data){
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt, 'INSERT INTO reservation (event_id, user_id, price, payment_method, dates) VALUES (?, ?, ?, ?, ?)')){
            return false;
        }else{
            // insert
            mysqli_stmt_bind_param($stmt, 'iiiss', $data['eventId'], $data['usersId'], $data['price'], $data['paymentMethod'], $data['cardDate']);
            mysqli_stmt_execute($stmt);
            return true;
        }
    }
    public function CheckUserReservation($userId, $eventId){
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt, 'SELECT * FROM reservation WHERE user_id = ? AND event_id = ?')){
            return false;
        }
        mysqli_stmt_bind_param($stmt, "ii", $userId, $eventId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        //check how many results we have inside $stmt
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0 || $row = mysqli_fetch_assoc($result)) {
            return $row;
        }else{
            return false;
        }
    }
}