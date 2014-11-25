<?php
		//データベースにつなぐ
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		$mid = $_POST['m_id'];
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "insert into hyou(m_id) values(".$mid.")";
		$result = mysqli_query($dbc, $query);
		

header('Location:usertop.php');

 ?>
