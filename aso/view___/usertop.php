<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
</head>
	
<body>


	<?php
		//データベースに接続
		ini_set('include_path', '/xampp/htdocs/aso/classes/');
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		echo '<p>投票ページ</p>';
		
			
		
		
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru ;";
		$result = mysqli_query($dbc, $query);
		
		
			echo '<form action="data.php" method="POST">';
			echo '<p>ジャンル：<select name="janru">';
		
			while($row = mysqli_fetch_array($result)) {
				$janru_id = $row['j_id'];
				$j_name = $row['j_name'];
				echo '<option value='.$janru_id.'>'.$j_name.'</option>';		
			}
			
			echo '</select></p>';
			echo '<input type="submit" value="選択" name="aaa" />';
			echo '</form>';
		
	?>
</body>
</html>




<body>
</body>
</html>