
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
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
		$query = "select * from member";
		$result = mysqli_query($dbc, $query);
		
		
			while($row = mysqli_fetch_array($result)){
			
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mjanru = $row['janru'];
			$mfree = $row['free'];
			echo '<a href="profile_select.php?mid=' .$mid.'" ><p>'.$mname.'</p></a>';
		}
		

	echo '<div id="main">';
	echo '<div id="pic">';
	
	echo '<p><img src="キャプチャ.JPG" width="84" height="193"  alt=""/></p>';
	echo '</div>';
	
	echo '<p><a href="data.php">黒木　啓市</a><br></p>';
	
	echo '<p><input type="button" name="button2" id="button2" value="投 票"></p>';
	echo '</div>';
	
	echo'<div id="main">';
	echo'</div>';
 ?>

</body>
</html>