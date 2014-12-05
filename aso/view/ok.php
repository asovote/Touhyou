

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
echo '<center>';
echo '<p><font size="80px">';
if(isset($_COOKIE[$jid])){ 
 	print("連続投票です。"); 
	exit; 
	 }else{
<<<<<<< HEAD
	echo '投票ありがとうございました'; 
	setcookie($jid,"vote_flag",time()+3600*24*3,"/"); 
=======
	echo '<br><br>投票ありがとうございました'; 
	setcookie($jid,"vote_flag",time()+3600*24*7,"/"); 
>>>>>>> 21392f88cdbf8bf62750fbba84ad55dd0cf7df96
	 } 
echo '</font></p>';
echo '</center>';
 ?>
</body>
</html>