<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="3; URL=../usertop.php">
</head>
<body>
<?php

	$id =$_POST['$mid'];
	if($mid!="a"){
	echo '本当に投票してもよろしいですか？';
	echo '<a href="ok.php?mid=a" ></a>';
	}
	else{
	echo '投票ありがとうございました';
	}
 ?>
</body>
</html>