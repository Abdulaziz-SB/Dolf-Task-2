<?php
// require_once './organizer.class.php';
// require_once '../helpers/session_helper.php';

class OrganizerContr extends Organizer{
    private $organizerModel;

    public function __construct() {
        $this->organizerModel = new Organizer;
    }

    public function showOrganizerEvents($organizerId){
        $result = $this->organizerModel->OrganizerEvents($organizerId);
        return $result;
    }
}
// addNewEvent
$init = new OrganizerContr;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST){
        case 'addEvent':
            break;
    }
}