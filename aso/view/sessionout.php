<?php
session_start();
if($_SESSION['ad_id'] == null){
header('Location: /ad_login.php');
}else{
 session_destroy();
header('Location: /ad_login.php');
}

?>