<?php
// require_once './organizer.class.php';
// require_once '../helpers/session_helper.php';
if(!isset($_SESSION['usersId'])){
    session_start();
}
// include_once './organizer.class.php';
// include_once '../helpers/session_helper.php';
// error_reporting(E_ERROR | E_PARSE);
// try {
// }catch (Exception $e){

// }

class OrganizerContr extends Organizer{
    private $organizerModel;

    public function __construct() {
        $this->organizerModel = new Organizer;
    }

    public function showOrganizerEvents($organizerId){
        $result = $this->organizerModel->OrganizerEvents($organizerId);
        return $result;
    }
    public function thousandsCurrencyFormat($num) {
        if($num>1000) {
      
              $x = round($num);
              $x_number_format = number_format($x);
              $x_array = explode(',', $x_number_format);
              $x_parts = array('k', 'm', 'b', 't');
              $x_count_parts = count($x_array) - 1;
              $x_display = $x;
              $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
              $x_display .= $x_parts[$x_count_parts - 1];
      
              return $x_display;
      
        }
      
        return $num;
      }
    
}
// addNewEvent
$init = new OrganizerContr;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
}