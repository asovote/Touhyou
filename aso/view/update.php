<?php	
		
		$_SESSION['jid'] = $_POST['jid'];
		//データベースにつなぐ
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query ="update mj_list set votes = votes + 1 where m_id =".$_POST['mid']." and j_id =".$_POST['jid'].";";
		$result = mysqli_query($dbc, $query);
		
		$_SESSION['jid'];

//header('Location:ok.php');

 ?>
