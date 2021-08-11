<?php

require_once './event.class.php';
require_once './dbh.class.php';

class EventContr extends Event{
    public function ShowAllEvents(){
        $result = $this->ViewEvents();
        return $result;
    }
}
echo 'ss';