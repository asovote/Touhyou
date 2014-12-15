<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>全件表示</title>
<link type="text/css" rel="stylesheet" href="./main.css">

</head>
<body>

<div id="tag">
<table>
<tr><th>
<form method ="POST" action = "select_janru_manage.php">
<input type ="submit" value="戻る">
</form></th><th>
<form method ="POST" action = "db_change.php">
<input type="hidden" name="time" value="0">
<input type="submit" value="スタート">
</form></th><th>
<form method ="POST" action = "db_change.php">
<input type="hidden" name="time" value="1">
<input type="submit" value="ストップ">
</form></th><th>
<form method ="POST" action = "db_change.php">
<input type="hidden" name="time" value="2">
<input type="submit" value="結果表示">
</form></th>
</tr>
</table>
</form>
</div>

<?php

session_start();

if($_SESSION['ad_id'] == null){
header('Location: /ad_login.php');
}

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
	
	require_once('include_path.php');
	require_once('db.php');
	
	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
	

function ignore($str){
	return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

function tag_kyoka($str){
 $search = array('&lt;br&gt;');
 $replace = array('<br>');
return str_replace($search,$replace,$str);
}


//	$userid = $mysqli -> real_escape_string($_post["xxx"]);  使わない。
	
	
//	$select_j_id = $_POST['select_j'];  //POSTで送られたjanruID取得
//	$is_j_id = (int)$select_j_id;
	
	printf($k);printf($k);printf($k);
	
	printf($k);printf($k);
	
	
	$mj_list_query = "select * from mj_list where j_id = " . $select_j_id . " order by votes desc"; // . "order by m_id"
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
		
		$query = "select * from member where m_id =" . $m_id; //とってきたジャンルで選択されたmemberを一人ずつ表示
		$result = $dbc -> query($query);					
		while($row = $result -> fetch_assoc()) {
			
			
			$bun1 = "参加者ID:%d "; // ""内はHTML
			$img_m_id = $row['m_id'];
			printf($bun1,$img_m_id);
			printf($k);
			
			$bun2 = "参加者名:%s ";
			$m_name = $row['name'];
			printf($bun2,$m_name);
			printf($k);



//			$img_query = "SELECT IMG FROM member WHERE m_id = " . $m_id ;
//			$img_result = $mysqli -> query($img_query);
//			$img_row = $img_result -> fetch_row();
//			echo "<img src=" . $img_row[0] . ">";
//			printf($img);
//			printf($k);
//			→直接表示すると文字化けする。


			require('imgget.php');

			$bun3 = "参加者紹介文:%s";
			$free = $row['free'];

$free = ignore($free);
$free = tag_kyoka($free);

			printf($bun3,$free);
			printf($k);

			
			$vquery = "select * from mj_list where m_id =". $m_id . " and j_id = " . $_SESSION['select_j'];
			$vresult = $dbc -> query($vquery);
			while($vote_row = $vresult -> fetch_assoc()) {
			
				$total = $vote_row['votes'];
				printf("<br />"."得票数: %d \n", $total);
					
			}
			
			
			$pquery = "select sum(votes) from mj_list where j_id = " . $_SESSION['select_j'];
			$presult = $dbc -> query($pquery);
			while($vote_row = $presult -> fetch_assoc()) {
			
				$sum = $vote_row['sum(votes)'];
					
			}
			$per = 0;
			if($sum == 0){
				$per = $total*100/$sum;
				floor($per);
				$p='%';
				printf("<br />"."得票率: %d %s\n", $per,$p);
			}else{
				$per = 0;
				floor($per);
				$p='%';
				printf("<br />"."得票率: %d %s\n", $per,$p);
			}
				

			
			
			
			$vm1 = "<p><form method=\"post\" action=\"vote_edit_new.php\"></p>";
			$vm2 = "<p><button type =\"submit\" value =%d name =\"m_id\"> 得票数変更 </button></p>";
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