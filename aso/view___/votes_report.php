                                                                                                                                          <html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>メンバー</title>
<body>

<?php
	//データベースに接続
	require_once('include_path.php');
	//require_once('C:/jyoko3dev/xampp/htdocs/aso/class/db.php');
	require_once('db.php');

	$mysqli = mysqli_connect(db_host, db_user, db_pass, db_name);

	//		$query = "isnert into m_votes (m_id) values(1)"; //$dbc = db.phpの関数

	//		if ($mysqli->query("insert into m_votes (m_id) values(1)") === TRUE) {
	//			printf("successfully inserted.\n");
	//		}


	$sampleid = 1;

	$result = $mysqli->query("select m_id,name,free from member where m_id = '$sampleid'");

	while($prof = mysqli_fetch_array($result)){

		$m_id = $prof['m_id'];
		$m_name = $prof['name'];
		$free = $prof['free'];
		
		printf('<p>'.$m_id.'<br />'.$m_name.'<br />'.$free.'</p>');
	}

	if ($vresult = $mysqli->query("select * from hyou")) {

		$row_cnt = $vresult->num_rows;
		
		printf("<br />"."TOTAL %d 票\n", $row_cnt);
		
		$vresult->close();
	}


	//		printf('<form id="vote" action ="hyouplus.php" method="post">');
	//		printf('<p><input type="button" value="投票" onclick="C:/joko3dev/htdocs/aso/view/hyouplus.php" /></p>');
	//		printf('</from>');




?>

</body>
</html>
