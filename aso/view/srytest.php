﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>プロフィール編集</title>
</head>
	
<body>
<Div Align="center">

	<?php

		//データベースに接続
	//	ini_set('include_path', '/xampp/htdocs/aso/classes/');
		require_once('include_path.php');
		require_once('db.php');
		
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);

//			$query = "select max(m_id) from member";
//			$result = $dbc -> query($query);
//			while($row = $result -> fetch_array()){			
//		 	echo $row['max(m_id)'];
//		 	}


			$imgget = "select * from member where m_id = 50"; 
			$result = $dbc -> query($imgget);
			while($row = $result -> fetch_assoc()) {
			require('imgget.php');
			}


	?>
	</div>
</body>
</html>
