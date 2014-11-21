	<?php
		//データベースに接続
		ini_set('include_path', '/xampp/htdocs/aso/classes/');
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		$jtime = 1;
		//$jtime = $_POST['stime'];
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "update janru set jtime=".$jtime." where j_id = 5";
		$result = mysqli_query($dbc, $query);
		if($jtime=0){
			
			}
		header('Location:isitime.php');
		
	//	echo "データベース更新";
	?>