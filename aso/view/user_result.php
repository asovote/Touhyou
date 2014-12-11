<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ランキング</title>
</head>
<body>
<body style="background-image:url(背景2.png);background-attachment:fixed;">

<form method ="POST" action = "usertop.php">
<input type ="submit" value="戻る">
</form>

<?php
	
	session_start();
	$k = "<br/>";	
	
	if(isset($_POST['jid'])){
	$select_j_id = $_POST['jid']; //スレッドID
	$_SESSION['jid']=$select_j_id;
	}else if($_SESSION['jid']){
	$select_j_id=$_SESSION['jid'];
	}else{
	echo '値が入っていません';
	}

	require_once('include_path.php');
	require_once('db.php');
	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);

	
	printf($k);printf($k);printf($k);
	
	$mj_list_query = "select * from mj_list where j_id = " . $select_j_id; // . "order by m_id"
//	選択されたジャンルに参加する人のm_idを取得する
	
	$mj_list_result = $dbc -> query($mj_list_query);
	while($mj_list_row = $mj_list_result -> fetch_assoc()) {
	
//	ジャンルの参加人数分だけ繰り返す
//	参加者の情報を1人ずつ表示する

//		$bun1 = "参加者ID:%d "; // ""内はHTML
		$m_id = $mj_list_row['m_id'];
		
		
		$query = "select * from member where m_id =" . $m_id; //とってきたジャンルで選択されたmemberを一人ずつ表示
		$result = $dbc -> query($query);
		
		if(!$result){
			printf('query failed.' . $dbc -> error);
			$dbc -> close();
			exit();
		}
		$k = "<br/>";
		
		$query = "select * from member,mj_list,janru where member.m_id =".$m_id." and mj_list.m_id = member.m_id and mj_list.j_id = janru.j_id order by mj_list.votes desc limit 3"; //とってきたジャンルで選択されたmemberを一人ずつ表示
		$result = $dbc -> query($query);
		
		$i =0;
		
		while($row = $result -> fetch_assoc()) {
			
			//順位の表示
			$i = $i + 1;
			echo '第'.$i.'位';
			
			//参加者情報			
			$bun2 = "参加者名:%s ";
			$m_name = $row['name'];
			printf($bun2,$m_name);
			printf($k);
			
			//画像の呼び出し
			require('imgget.php');
		
			$bun3 = "参加者紹介文:%s";
			$free = $row['free'];
			printf($bun3,$free);
			printf($k);
			
			printf($k);printf($k);printf($k);printf($k);printf($k);
			printf("----------------------------------------------------------------------------------------------");
			printf($k);printf($k);printf($k);printf($k);printf($k);
		}
	}
	
	
	
	printf($k);printf($k);printf($k);
	printf($k);printf($k);printf($k);
	
?>

<html>
</body>
</html>