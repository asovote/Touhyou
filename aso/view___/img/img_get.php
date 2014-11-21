<?php


// DB接続
$mysqli = new mysqli('localhost', 'root', '');
	if ($mysqli -> connect_errno) {
		print('<p>データベースへの接続に失敗しました。</p>' . $mysqli -> connect_error);
		exit();
	}
	$mysqli -> select_db('test');
	$mysqli -> set_charset("utf-8");
	

// 画像データ取得
$query = "SELECT m_img FROM member WHERE m_id = " . $_GET['m_id'] ;


$result = $mysqli -> query($query);
$row = $result -> fetch_row();

echo $row[0];
?>

