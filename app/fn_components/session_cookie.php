<?php
//クッキー・セッション操作を行うphp
session_start();

function fnc_getData($mode = '', $name = ''){
  $data = "";
  if($mode == "session"){
    if(isset($_SESSION[$name])){
      $data = $_SESSION[$name];
    }
  }else{
    if(isset($_COOKIE[$name])){
      $data = $_COOKIE[$name];
    }
  }
  return $data;
}

function fnc_setData($mode = '', $name = '', $value = '', $time = 180){
  if($mode == "session"){
    $_SESSION[$name] = $value;
  }else{
    setcookie($name, $value, time() + $time);
  }
}



function fnc_delData($mode = '', $name = '', $kbn = ''){
  if($mode == 'session'){
    if($kbn == 'all'){
      session_destroy();
    }else{
      if(isset($_SESSION[$name])){
        unset($_SESSION[$name]);
      }
    }
  }else{
    //if(isset($_COOKIE[$name])){
      setcookie($name,'',time() -3600);
    //}
  }
}



?>
