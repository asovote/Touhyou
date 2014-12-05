

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
	echo '<br><br>投票ありがとうございました'; 
	setcookie($jid,"vote_flag",time()+3600*24*7,"/"); 
	 } 
echo '</font></p>';
echo '</center>';
 ?>
</body>
</html>