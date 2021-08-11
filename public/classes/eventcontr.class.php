<?php

require_once './event.class.php';

class EventContr extends Event{
    public function ShowAllEvents(){
        $result = $this->ViewEvents();
        return $result;
    }
}