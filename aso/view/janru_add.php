<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ジャンルの編集</title>
<link type="text/css" rel="stylesheet" href="">
</head>

<body>
<?php

session_start();

if($_SESSION['ad_id'] == null){	
header('Location: /ad_login.php');
}

require_once('include_path.php');
require_once('db.php');
$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);

$jname = $_POST["jname"];

if($jname == null) {
	header('Location: /janru_insert.php?chk=1');			//ジャンル名未入力時
}

$chkresult = $dbc -> query("select j_name from janru");
while($chk_row = $chkresult -> fetch_array()){
	$chk_jname = $chk_row['j_name'];
	if($chk_jname == $jname){
		header('Location: /janru_insert.php?chk=2');
	}
}

$result= $dbc -> query("insert into janru(j_id, j_name) VALUES (null,'$jname')");



?>
</body>
</html>