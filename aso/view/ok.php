﻿

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="3; URL=../usertop.php">
</head>
<body>
<?php
session_start();	
$jid = $_SESSION['jid']; //スレッドID
if(isset($_COOKIE[$jid])){ 
 	print("連続投票です。"); 
	exit; 
	 }else{
	echo '投票ありがとうございました'; 
	setcookie($jid, "vete_flg", time()+3600*24*7,"/"); 
	 } 

 ?>
</body>
</html>