<?php

if(!isset($_SESSION)){
    session_start();
}
// this function to display error or success messages
function flash($name = '', $message = '', $class = 'text-center p-2 text-red-600'){
    // if name and message not empty and we can't find session, store message
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }else if(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : $class;
            echo '<div class="'.$class.'">'.$_SESSION[$name].'</div>';
            // on page refresh delete content
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}

function redirect($location){
    header('location: '.$location);
    exit();
}