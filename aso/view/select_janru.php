﻿<html>
<title>
ジャンル選択
</title>
<head>
<link type="text/css" rel="stylesheet" href="./select_janru.css">

</head>
<body>
<body style="background-image:url(背景2.png);background-attachment:fixed;">

<?php

		echo '<div id="link"><p><a href="kanri_top.php">トップへ戻る</a></p></div>';
		echo '<div id="top"><p1>投票結果画面</p1></div>';

	session_start();
	//ini_set( "display_errors", "Off");
	//require("http://enzerus.com/aso/atack.php");
	
	$mysqli = new mysqli('localhost', 'root', '');
	if ($mysqli -> connect_errno) {
		print('<p>データベースへの接続に失敗しました。</p>' . $mysqli -> connect_error);
		exit();
	}
	//
	$mysqli -> select_db('test');
	$mysqli -> set_charset("utf-8");
	
	$select_janru_query = "select * from janru";
	$janru_list = $mysqli -> query($select_janru_query);
	
	if(!$janru_list){
		printf('query failed.' . $mysqli -> error);
		$mysqli -> close();
		exit();
	}
	
	$k = "<br/>";
	echo '<div id="button">';
	while($row = $janru_list -> fetch_assoc()) {
		$j_id = $row['j_id'];
		$j_name = $row['j_name'];
//		printf($j_id);
		$bun1 = "<p><form method=\"post\" action=\"vote_result.php\"></p>";
		$bun2 = "<p><button type =\"submit\" value =%d name =\"select_j\"> %s </button></p>";
		printf($bun1);
		printf($bun2,$j_id,$j_name);
	}
	echo '</div>';

?>

</body>
</html>