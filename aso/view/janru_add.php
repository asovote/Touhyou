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

if($chkresult = $dbc -> query("select * from janru where j_name = カラオケ")){			//入力されたジャンル名の行を検索
	$j_num = $chkresult -> num_rows;
	echo $j_num;
}





?>
</body>
</html>