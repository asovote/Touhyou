﻿<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>全件表示</title>
</head>
<body>

<form method ="POST" action = "select_janru_manage.php">
<input type ="submit" value="戻る">
</form>


<?php
	
	session_start();
	$k = "<br/>";
//	$get_janru = $_POST['select_j'];  //POSTで送られたjanruID取得
//	printf('<form method="POST" action = "../e_m_e_search">');
//	printf('<input type="submit" value="投票数変更" onClick="form.action=\'vote_edit.php\';return true"/>');
	
	
	
	if(!isset($_POST['select_j'])) {
	$select_j_id = $_SESSION['select_j'];
	}else{
	$select_j_id = $_POST['select_j'];
	$_SESSION['select_j'] =$select_j_id;
	}
<<<<<<< HEAD
	
	


	
	$mysqli = new mysqli('localhost', 'root', '');
	if ($mysqli -> connect_errno) {
		print('<p>データベースへの接続に失敗しました。</p>' . $mysqli -> connect_error);
		exit();
	}
	
	
	$mysqli -> select_db('test');
		
	$mysqli -> set_charset("utf-8");
	
=======

require_once('include_path.php');
require_once('db.php');

	
>>>>>>> e682b5ecb4d8d6305405fe2cd4285117b152b578
//	$userid = $mysqli -> real_escape_string($_post["xxx"]);  使わない。
	
	
//	$select_j_id = $_POST['select_j'];  //POSTで送られたjanruID取得
//	$is_j_id = (int)$select_j_id;
	
	printf($k);printf($k);printf($k);
	
	printf($k);printf($k);
	
	
	$mj_list_query = "select * from mj_list where j_id = " . $select_j_id . " order by m_id"; // . "order by m_id"
//	選択されたジャンルに参加する人のm_idを取得する
	
<<<<<<< HEAD
	$mj_list_result = $mysqli -> query($mj_list_query);
=======
	$mj_list_result = $dbc -> query($mj_list_query);
>>>>>>> e682b5ecb4d8d6305405fe2cd4285117b152b578
	while($mj_list_row = $mj_list_result -> fetch_assoc()) {
	
//	ジャンルの参加人数分だけ繰り返す
//	参加者の情報を1人ずつ表示する

//		$bun1 = "参加者ID:%d "; // ""内はHTML
		$m_id = $mj_list_row['m_id'];
		
		
		$query = "select * from member where m_id =" . $m_id; //とってきたジャンルで選択されたmemberを一人ずつ表示
<<<<<<< HEAD
		$result = $mysqli -> query($query);
		
		if(!$result){
			printf('query failed.' . $mysqli -> error);
			$mysqli -> close();
=======
		$result = $dbc -> query($query);
		
		if(!$result){
			printf('query failed.' . $dbc -> error);
			$dbc -> close();
>>>>>>> e682b5ecb4d8d6305405fe2cd4285117b152b578
			exit();
		}
		$k = "<br/>";
		
		$query = "select * from member where m_id =" . $m_id; //とってきたジャンルで選択されたmemberを一人ずつ表示
<<<<<<< HEAD
		$result = $mysqli -> query($query);
					
=======
		$result = $dbc -> query($query);					
>>>>>>> e682b5ecb4d8d6305405fe2cd4285117b152b578
		while($row = $result -> fetch_assoc()) {
			
			
			$bun1 = "参加者ID:%d "; // ""内はHTML
			$img_m_id = $row['m_id'];
			printf($bun1,$img_m_id);
			printf($k);
			
			$bun2 = "参加者名:%s ";
<<<<<<< HEAD
			$m_name = $row['name'];
=======
			$m_name = $row['m_name'];
>>>>>>> e682b5ecb4d8d6305405fe2cd4285117b152b578
			printf($bun2,$m_name);
			printf($k);



//			$img_query = "SELECT IMG FROM member WHERE m_id = " . $m_id ;
//			$img_result = $mysqli -> query($img_query);
//			$img_row = $img_result -> fetch_row();
//			echo "<img src=" . $img_row[0] . ">";
//			printf($img);
<<<<<<< HEAD
//			printf($k);s
=======
//			printf($k);
>>>>>>> e682b5ecb4d8d6305405fe2cd4285117b152b578
//			→直接表示すると文字化けする。


			require('imgget.php');		
		
			$bun3 = "参加者紹介文:%s";
			$free = $row['free'];
			printf($bun3,$free);
			printf($k);
			
<<<<<<< HEAD
			
		//	(int)$votes = $row['votes_manage'];
			
			
			if ($votes_result = $mysqli -> query("select * from hyou where m_id =". $m_id)) {
				$row_cnt = $votes_result -> num_rows;
				$total = $row_cnt;// + $votes;
				printf("<br />"."得票数: %d \n", $total);
				$votes_result->close();
=======
			$vquery = "select * from mj_list where m_id =". $m_id . " and j_id = " . $_SESSION['select_j'];
			$vresult = $dbc -> query($vquery);
			while($vote_row = $vresult -> fetch_assoc()) {
			
				$total = $vote_row['m_votes'];
				printf("<br />"."得票数: %d \n", $total);
					
>>>>>>> e682b5ecb4d8d6305405fe2cd4285117b152b578
			}
			
			
			$vm1 = "<p><form method=\"post\" action=\"vote_edit_new.php\"></p>";
			$vm2 = "<p><button type =\"submit\" value =%d name =\"m_id\"> 投票数変更 </button></p>";
			printf($vm1);
			printf($vm2,$img_m_id);
			printf('</form>');
			
			
			
			printf($k);printf($k);printf($k);printf($k);printf($k);
			printf("----------------------------------------------------------------------------------------------");
			printf($k);printf($k);printf($k);printf($k);printf($k);
		}
	}
	
	
	
	printf($k);printf($k);printf($k);
	printf($k);printf($k);printf($k);
	
	


	
		
		
	
//	unset($_SESSION['img_id']);

?>
<html>
</body>
</html>