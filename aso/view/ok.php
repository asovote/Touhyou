

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="3; URL=../usertop.php">
</head>
<body>
<?php
        session_start();
        $jid = $_SESSION['$jid']; //スレッドID
	
	echo $jid;

 ?>
</body>
</html>