<?php
// DB接続
	//データベースに接続
ini_set('include_path', '/xampp/htdocs/aso/classes/');
require_once('include_path.php');
require_once('db.php');
require_once('ipath.php');


$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);


// 画像データ取得
$query = "SELECT m_img FROM member WHERE  m_id = " . $_GET['id'];
$result = mysqli_query($dbc, $query);
$row = mysql_fetch_row($result);

// 画像ヘッダとしてjpegを指定（取得データがjpegの場合）
header("Content-Type: image/jpeg");

// バイナリデータを直接表示
echo $row[0];
?>>��を直接表示
echo $row[0];
?>