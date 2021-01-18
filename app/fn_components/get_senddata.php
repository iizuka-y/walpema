<?php

function get_sendData($key){
    global $sendData;

    if(isset($sendData)){
        return $sendData[$key];
    }

    return null;
}

?>