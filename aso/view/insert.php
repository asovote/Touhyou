<?php
		//データベースにつなぐ
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		$mid = $_POST['m_id'];
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "update vote set m_votes = m_votes + 1 where m_id = " .$mid." and  j_id  = " . $_SESSION['select_j'])";
		$result = mysqli_query($dbc, $query);
		

header('Location:ok.php/timer.html');

 ?>
