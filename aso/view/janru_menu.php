<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>全件表示</title>
<link type="text/css" rel="stylesheet" href="./main.css">
</head>

<body>
<?php

session_start();

if($_SESSION['ad_id'] == null){			//ログインチェック
header('Location: /ad_login.php');
}

	$k = "<br/>";				//改行用こぴぺ
	
	
	require_once('include_path.php');
	require_once('db.php');
	
	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);


	function ignore($str){			//html~~~~~呼び出し変数
		return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
	}

	function tag_kyoka($str){		//<br>のみ許可
	 $search = array('&lt;br&gt;');
	 $replace = array('<br>');
	return str_replace($search,$replace,$str);
	}






?>

<input type="button" name="janru_insert">
<input type="button" name="janru_update">
<input type="button" name="janru_delete">


</body>
</html>