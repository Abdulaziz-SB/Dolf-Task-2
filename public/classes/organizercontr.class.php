<?php
// require_once './organizer.class.php';
// require_once '../helpers/session_helper.php';
include './organizer.class.php';
error_reporting(E_ERROR | E_PARSE);
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
    public function addEvent(){
        echo 'hello os';
        // $file = $_FILES['imgFile'];
        // print_r($file);
        // $fileName = $file['name'];
    }
}
// addNewEvent
// $init = new OrganizerContr;

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     switch($_POST){
//         case 'addEvent':
//             require_once './organizer.class.php';
//             $init->addEvent();
//             break;
//     }
// }