<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>ランキング</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
  <body style="background-image:url(img/123.png);background-attachment:fixed;">
    <div class="container">  

<table width="100%"><tbody>
<tr>
<td>
<img src="img/noun_63651_cc.png" width="38" height="42" onclick="history.back()" />
</td>
<td>
<img src="img/asofes.png" width="100%" >
</td>
</tr>
</tbody>
</table>
<p class="head"><input type="image" src="img/noun_63651_cc.png" width="20" height="30" onclick="history.back()">
</p>


<?php
	
	session_start();
	$k = "<br/>";
//	$get_janru = $_POST['select_j'];  //POSTで送られたjanruID取得
//	printf('<form method="POST" action = "../e_m_e_search">');
//	printf('<input type="submit" value="投票数変更" onClick="form.action=\'vote_edit.php\';return true"/>');
	
	
	
	if(isset($_POST['jid'])){
	$select_j_id = $_POST['jid']; //スレッドID
	$_SESSION['jid']=$select_j_id;
	}else if($_SESSION['jid']){
	$select_j_id=$_SESSION['jid'];
	}else{
	echo '値が入っていません';
	}

	
	
/*	
	if(!isset($_POST['select_j'])) {
	$select_j_id = $_SESSION['select_j'];
	}else{
	$select_j_id = $_POST['select_j'];
	$_SESSION['select_j'] =$select_j_id;
	}
	
*/	


	
	require_once('include_path.php');
	require_once('db.php');
	header('Expires:-1');
	header('Cache-Control:');
	header('Pragma:');

	
	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);


function ignore($str){
	return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

function tag_kyoka($str){
 $search = array('&lt;br&gt;');
 $replace = array('<br>');
return str_replace($search,$replace,$str);
}

	
	
	$sum = 0;
	$mj_list_query = "select * from mj_list where j_id = " . $select_j_id . " order by votes desc limit 3"; // . "order by m_id"
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
		
		$query = "select * from member,mj_list,janru where member.m_id =".$m_id." and mj_list.m_id = member.m_id and mj_list.j_id = janru.j_id order by mj_list.votes "; //とってきたジャンルで選択されたmemberを一人ずつ表示
		$result = $dbc -> query($query);
		
		
		
		while($row = $result -> fetch_assoc()) {
			
			//順位の表示
			$sum += 1;
			
			echo '第'.$sum.'位';
			
			printf($k);printf($k);
			//参加者情報
			
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
			
			
	/*		$vquery = "select * from mj_list where m_id =". $m_id . " and j_id = " . $_SESSION['select_j'];
			$vresult = $dbc -> query($vquery);
			while($vote_row = $vresult -> fetch_assoc()) {
			
				$total = $vote_row['votes'];
				printf("<br />"."得票数: %d \n", $total);
					
			}
	*/		
			
			printf($k);printf($k);
			printf("----------------------------------------------------------------------------------------------");
			printf($k);printf($k);
		}
	}
	//	unset($_SESSION['img_id']);

?>

<html>
</body>
</html>