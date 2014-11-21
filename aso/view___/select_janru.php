<html>
<title>
ジャンル選択
</title>
<head>
</head>
<body>

<h2>投票数確認<br/></h2>
ジャンル選択

<?php
	session_start();
	
	$mysqli = new mysqli('localhost', 'root', '');
	if ($mysqli -> connect_errno) {
		print('<p>データベースへの接続に失敗しました。</p>' . $mysqli -> connect_error);
		exit();
	}
	//select_dbでデータベースを選択している
	$mysqli -> select_db('test');
	//文字コードの選択
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
		//printf($j_id);
		$bun1 = "<p><form method=\"post\" action=\"vote_result.php\"></p>";
		$bun2 = "<p><button type =\"submit\" value =%d name =\"select_j\"> %s </button></p>";
		printf($bun1);
		printf($bun2,$j_id,$j_name);
	}


?>

</body>
</html>