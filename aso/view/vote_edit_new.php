<html>
<head>
<!--JavaScript使用の宣言-->
<meta http-equiv='Content-Style-Type' content='text/javascript'>
<meta http-equiv="Content-Type" content="text/html; charset=SHIFT-JIS">
<title>全件表示</title>
</head>
<body>

<script type="text/javascript" src="js/textcheck.js" ></script>
<script type="text/javascript" src="js/onlynum.js" ></script>

<script type="text/javascript">
window.onunload = function(){};
history.forward();
</script>


<?php
	
	session_start();
	$k = "<br/>";
//	$session_j_id = $_SESSION['j_id'];
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
		$m_name = $row['m_name'];
		printf($bun2,$m_name);
		printf($k);
		
		$img = "<img src=\"img/img_get.php?m_id=" . $m_id . "\">";
		printf($img);
		printf($k);
		
		(int)$votes = $row['votes_manage'];
		
		if ($votes_result = $mysqli -> query("select * from m_votes where m_id =". $m_id)) {
			$row_cnt = $votes_result -> num_rows;
			$total = $row_cnt + $votes;
			printf("<br />"."得票数: %d \n", $total);
			$votes_result->close();
		}
		printf($k);
	}
?>

<form method="POST" name="changeV" action = "vote_change.php">

<input type="text" style="ime-mode: disabled;" istyle="4" format="6N" MODE="numeric" name="Vtext" size="10" maxlength="5" value="" onKeyup="this.value=this.value.replace(/[^0-9]+/,'')" onchange="chktext()"><br><br>
<input type="submit" value="追加" name="VVV" disabled>
<input type="submit" value="削除" name="VVV" disabled>

</form>

</body>
</html>
