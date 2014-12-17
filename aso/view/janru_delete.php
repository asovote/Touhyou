<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ジャンルの編集</title>
<link type="text/css" rel="stylesheet" href="">
</head>

<body>
<form name="delete" action="jdelete_do.php" method="post">
<?php

session_start();

if($_SESSION['ad_id'] == null){
header('Location: /ad_login.php');
}

require_once('include_path.php');
require_once('db.php');
$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);

$k = "<br/>";

	$allj = "select * from janru;";
	$result = $dbc -> query($allj);
	while($janru = $result -> fetch_assoc()) {
	$jid = $janru['j_id'];
	$jname = $janru['j_name'];
	echo $jname;
	$chkbox = "<input type=\"checkbox\" name=\"janru[]\" value=\"%d\">";
	printf($chkbox,$jid);
	printf($k);

}
?>

<input type="submit" value="削除">
<input type="reset" value="取消">
</form>
</body>
</html>