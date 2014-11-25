<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>投票システム</title>
<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>




<div id="title"><h2>投票画面</h2></div>

<?php
		
		//データベースにつなぐ
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from member where janru=5";
		$result = mysqli_query($dbc, $query);
		
		
			while($row = mysqli_fetch_array($result)){
			
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mjanru = $row['janru'];
			$mfree = $row['free'];
			$mpic = $row['m_img'];
			
	echo '<div id="main">';
	echo '<div id="pic">';
	
	
	echo '<form method="POST" action="./insert.php">';

	echo '<p><input type="submit" name="button2" value="投 票"></p>';
	echo '<input type="hidden" name="m_id" value="'.$mid.'"></form>';
	echo '</div>';
	
	echo'<div id="main">';
	echo'</div>';
	echo '<a href="profile_select.php?mid=' .$mid.'" ><p>'.$mname.'</p><p>'.$mschool.'</p><p>'.$mid.'</p><p>'.$janru.'</p><p>'.$mfree.'</p><p>'.$mpic.'</p></a>';

		}
		


 ?>

</body>
</html>