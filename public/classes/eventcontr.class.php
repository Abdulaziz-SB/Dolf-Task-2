<?php
if(!isset($_SESSION['usersId'])){
    session_start();
}
// require_once './event.class.php';
// require_once './dbh.class.php';

class EventContr extends Event{
    public function ShowAllEvents(){
        $result = $this->ViewEvents();
        return $result;
    }
    public function Organizer($organizer){
        $result = $this->GetOrganizer($organizer);
        return $result;
    }
    public function Event($event){
        $result =  $this->GetEvent($event);
        return $result;
    }
    public function ShowMyEvents(){
        $result = $this->ShowMyReservedEvents($_SESSION['usersId']);
        return $result;
    }
    public function ReservedEvents($userId){
        $result = $this->GetMyReservedEvents($userId);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}