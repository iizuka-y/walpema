<?php
require_once(dirname(__FILE__).'/before_view.php');

if($current_user){
	fnc_delData("session","","all");
	header("Location: ../../view/logout.php");
}else{
	header("Location: ../../view/index.php");
}

?>