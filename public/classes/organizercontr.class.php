<?php
// require_once './organizer.class.php';
// require_once '../helpers/session_helper.php';
if(!isset($_SESSION['usersId'])){
    session_start();
}

class OrganizerContr extends Organizer{
    private $organizerModel;

    public function __construct() {
        $this->organizerModel = new Organizer;
    }

    public function showOrganizerEvents($organizerId){
        $result = $this->organizerModel->OrganizerEvents($organizerId);
        return $result;
    }
    // convert thousands to a currency
    public function thousandsCurrencyFormat($num) {
        if($num>1000) {
      
              $x = round($num);
              $x_number_format = number_format($x);
              $x_array = explode(',', $x_number_format);
              $x_parts = array('K', 'M', 'B', 'T');
              $x_count_parts = count($x_array) - 1;
              $x_display = $x;
              $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
              $x_display .= $x_parts[$x_count_parts - 1];
      
              return $x_display;
      
        }
      
        return $num;
    }
    // display registered customers in admin dashboard
    public function getReservedUsers($organizerId){
        $result = $this->organizerModel->GetMyReservedEvents($organizerId);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    // revenue display
    public function GetOrganizerRevenue($organizerId){
        $result = $this->organizerModel->GetRevenue($organizerId);
        if($result){
            // get and return total revenue
            $row = $result->fetch_assoc();
            return $row['total_revenue'];
        }else{
            return false;
        }
    }
    //get the number of users who attendant organizer events
    public function GetAttendentUsers($organizerId){
        $result = $this->organizerModel->GetAttendentCustomers($organizerId);
        if($result){
            // get and return total revenue
            $row = $result->fetch_assoc();
            return $row['total_attendance'];
        }else{
            return false;
        }
    }
}
// addNewEvent
$init = new OrganizerContr;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
}