<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>プロフィール</title>
<link href="style2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h2>プロフィール参照</h2>
<?php
		
		$janru = $_GET['janru'];
	
		//データベースにつなぐ
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		
		
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from member where janru='$janru'";
		$result = mysqli_query($dbc, $query);
		
		
			while($row = mysqli_fetch_array($result)){
			
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mjanru = $row['janru'];
			$mfree = $row['free'];
			
	echo '<div id="main">';
	echo '<div id="pic">';
	
	
	echo '<form method="POST" action="./insert.php">';

	echo '<p><input type="submit" name="button2" value="投 票"></p>';
	echo '<input type="hidden" name="m_id" value="'.$mid.'"></form>';
	echo '</div>';
	
	echo'<div id="main">';
	echo'</div>';
	echo '<a href="profile_select.php?mid=' .$mid.'" ><p>'.$mname.'</p></a>';
		}
		



?>


</body>
</html>