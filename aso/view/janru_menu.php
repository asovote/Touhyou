<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>�S���\��</title>
<link type="text/css" rel="stylesheet" href="./main.css">
</head>

<body>
<?php

session_start();

if($_SESSION['ad_id'] == null){			//���O�C���`�F�b�N
header('Location: /ad_login.php');
}

	$k = "<br/>";				//���s�p���҂�
	
	
	require_once('include_path.php');
	require_once('db.php');
	
	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);


	function ignore($str){			//html~~~~~�Ăяo���ϐ�
		return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
	}

	function tag_kyoka($str){		//<br>�̂݋���
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