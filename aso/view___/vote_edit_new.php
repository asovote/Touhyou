<html>
<head>
<!--JavaScript使用の宣言-->
<meta http-equiv='Content-Style-Type' content='text/javascript'>
<meta http-equiv="Content-Type" content="text/html; charset=SHIFT-JIS">
<title>全件表示</title>
</head>
<body>

<script type="text/javascript" src="js/jquery.js" ></script>

<?php
	
	session_start();
	$k = "<br/>";
	$session_j_id = $_SESSION['j_id'];
//	$_SESSION['j_id'] = $session_j_id;
	
	
	if(!isset($_POST['m_id'])) {
	$m_id = $_SESSION['m_id'];
	}else{
	$m_id = $_POST['m_id'];
	$_SESSION['m_id'] = $m_id;
	}
	
	printf('<form method="POST" action = "">');
	printf('<input type="submit" value="戻る" onClick="form.action=\'vote_manage.php\';return true"/>');
	printf('</form>');
	
	$mysqli = new mysqli('localhost', 'root', '');
	if ($mysqli -> connect_errno) {
		print('<p>データベースへの接続に失敗しました。</p>' . $mysqli -> connect_error);
		exit();
	}
	
	
	$mysqli -> select_db('test');
		
	$mysqli -> set_charset("utf-8");
	
//	$userid = $mysqli -> real_escape_string($_post["xxx"]);  使わない。
	
	
//	$select_j_id = $_POST['select_j'];  //POSTで送られたjanruID取得
//	$is_j_id = (int)$select_j_id;
	
	printf($k);printf($k);printf($k);
	
	printf($k);printf($k);
	
	
	$query = "select * from member where m_id = " . $m_id;
	
	$result = $mysqli -> query($query);
	while($row = $result -> fetch_assoc()) {
	
		$bun1 = "参加者ID:%d "; // ""内はHTML
		$m_id = $row['m_id'];
		printf($bun1,$m_id);
		printf($k);
		
		$bun2 = "参加者名:%s ";
		$m_name = $row['name'];
		printf($bun2,$m_name);
		printf($k);
		
		$img = "<img src=\"img/img_get.php?m_id=" . $m_id . "\">";
		printf($img);
		printf($k);
		
		if ($votes_result = $mysqli -> query("select * from m_votes where m_id =". $m_id)) {
			$row_cnt = $votes_result -> num_rows;
			printf("<br />"."得票数: %d \n", $row_cnt);
			$votes_result->close();
			printf($k);
		}
		printf($k);
	}
?>

<input type="text" id="text" />
<input type="submit" id="submit" value="Submit" />


</body>
</html>