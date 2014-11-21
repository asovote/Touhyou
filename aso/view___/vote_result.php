<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>全件表示</title>
</head>
<body>


<?php
	
	session_start();
	$k = "<br/>";
	$get_janru = $_POST['select_j'];  //POSTで送られたjanruID取得
	
	
	$mysqli = new mysqli('localhost', 'root', '');
	if ($mysqli -> connect_errno) {
		print('<p>データベースへの接続に失敗しました。</p>' . $mysqli -> connect_error);
		exit();
	}
	
	
	$mysqli -> select_db('test');
		
	$mysqli -> set_charset("utf-8");
	
//	$userid = $mysqli -> real_escape_string($_post["xxx"]);  使わない。
	
	
	$select_j_id = $_POST['select_j'];  //POSTで送られたjanruID取得
	$is_j_id = (int)$select_j_id;
	
	
	
	$mj_list_query = "select * from member where j_id = " . $select_j_id . " order by m_id"; // . "order by m_id"
//	選択されたジャンルに参加する人のm_idを取得する
	
	$mj_list_result = $mysqli -> query($mj_list_query);
	while($mj_list_row = $mj_list_result -> fetch_assoc()) {
	
//	ジャンルの参加人数分だけ繰り返す
//	参加者の情報を1人ずつ表示する

//		$bun1 = "参加者ID:%d "; // ""内はHTML
		$m_id = $mj_list_row['m_id'];
		
		
		$query = "select * from member where m_id =" . $m_id; //とってきたジャンルで選択されたmemberを一人ずつ表示
		$result = $mysqli -> query($query);
		
		if(!$result){
			printf('query failed.' . $mysqli -> error);
			$mysqli -> close();
			exit();
		}
		$k = "<br/>";
		
		while($row = $result -> fetch_assoc()) {
			$bun1 = "参加者ID:%d "; // ""内はHTML
			$img_m_id = $row['m_id'];
			printf($bun1,$img_m_id);
			printf($k);
			
			$bun2 = "参加者名:%s ";
			$m_name = $row['m_name'];
			printf($bun2,$m_name);
			printf($k);



//		$img_query = "SELECT IMG FROM member WHERE m_id = " . $m_id ;
//		$img_result = $mysqli -> query($img_query);
//		$img_row = $img_result -> fetch_row();
//		echo "<img src=" . $img_row[0] . ">";
//		printf($img);
//		printf($k);
//		→直接表示すると文字化けする。


//		$_SESSION['img_id'] = $m_id;
		$img = "<img src=\"img/img_get.php?m_id=" . $img_m_id . "\">";
		printf($img);
		printf($k);
		
		
		$bun3 = "参加者紹介文:%s";
		$free = $row['free'];
		printf($bun3,$free);
		printf($k);
		printf($k);
		printf($k);
		}
	}
	
	
	
	printf($k);printf($k);printf($k);
	printf($k);printf($k);printf($k);
	
	
	

	
		
		
	
//	unset($_SESSION['img_id']);

?>

<html>
</body>
</html>