<html>
<title>
ジャンル選択
</title>
<head>
</head>
<body>

<?php
	session_start();
	
	$mysqli = new mysqli('localhost', 'root', '');
	if ($mysqli -> connect_errno) {
		print('<p>データベースへの接続に失敗しました。</p>' . $mysqli -> connect_error);
		exit();
	}
	
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
	
	while($row = $janru_list -> fetch_assoc()) {
		$j_id = $row['j_id'];
		$j_name = $row['j_name'];
//		printf($j_id);
		$bun1 = "<p><form method=\"post\" action=\"vote_manage.php\"></p>";
		$bun2 = "<p><button type =\"submit\" value =%d name =\"select_j\"> %s </button></p>";
		printf($bun1);
		printf($bun2,$j_id,$j_name);
	}
		echo '<p><a href="kanri_top.html">トップへ戻る</a>';


?>

</body>
</html>