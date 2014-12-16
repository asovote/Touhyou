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

?>

<form action="./janru_insert.php">
<input type="button" name="janru_insert" value="ジャンルの追加" ><br>
<input type="button" name="janru_update" value="ジャンルの変更" onclick="location.href='janru_udpate.php'"><br>
<input type="button" name="janru_delete" value="ジャンルの削除" onclick="location.href='janru_delete.php'">
<form>

</body>
</html>