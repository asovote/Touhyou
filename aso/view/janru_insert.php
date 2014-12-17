<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ジャンルの編集</title>
<link type="text/css" rel="stylesheet" href="">
function reload(){
header('Location: /janru_insert.php');
}
</head>

<body>


<?php

session_start();

if($_SESSION['ad_id'] == null){	
header('Location: /ad_login.php');
}

if(isset($_GET['chk'])){
$chk = $_GET['chk'];
}

?>

<form name="jadd" action="janru_add.php" method="POST">
<p>ジャンル名：<input type="text" name="jname" maxlength="6"/></p>
<input type="submit" value="登録" name="add" />
<input type="reset" value="リセット" />
</form>

<?php

if(isset($chk)){
if($chk == 1){
	echo "ジャンル名を入力してください。";
	function reload();
}else if($chk == 2){
	echo "既に存在するジャンル名です。";
	function reload();
	}
}

?>
</body>
</html>