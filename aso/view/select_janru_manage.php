<!DOCTYPE html>
<html lang="ja">
<head>
  <title>ジャンル選択</title>
  <meta charset="utf-8">
  <link type="text/css" rel="stylesheet" href="./select_janru.css">

</head>
<body>
<body style="background-image:url(背景2.png);background-attachment:fixed;">
<center>
<?php
	session_start();
	echo '<div id="link"><p><a href="kanri_top.php">トップへ戻る</a><a href="join.php">ジャンル結合</a></p></div>';
	echo '<div id="top"><p1>中間状況確認画面</p1></div>';

	
	require_once('include_path.php');
	require_once('db.php');
	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
	
	$select_janru_query = "select * from janru";
	$janru_list = $dbc -> query($select_janru_query);
	
	if(!$janru_list){
		printf('query failed.' . $dbc -> error);
		$dbc -> close();
		exit();
	}
	
	$k = "<br/>";
	
//	echo '<div class="nav">';
	//echo '<ul class="nl">';
	while($row = $janru_list -> fetch_assoc()) {
		$j_id = $row['j_id'];
		$j_name = $row['j_name'];
//		printf($j_id);
		$bun1 = "<p><form method=\"post\" action=\"vote_manage.php\"></p>";
	//	$bun2 = "<a href=vote_manage.php?select_j=".$j_id." ><p>".$j_name."</p></a>";
		$bun2 = "<p><button type =\"submit\" value =%d name =\"select_j\"> %s </button></p></form>";
/*	echo '<li>';
	echo '<FORM NAME="select_j" METHOD="POST" ACTION="vote_manage.php">';
	echo '<A HREF="vote_manage.php">'.$j_name.'</A>';
	echo '<input type="hidden" name="select_j" value="'.$j_id.'">';
	echo '</FORM>';
*/		printf($bun1);
	//	printf($bun2);
		printf($bun2,$j_id,$j_name);
//	echo '</li>';
	}
//	echo '</ul>';
	echo '</div>';



?>
</center>

</body>
</html>
