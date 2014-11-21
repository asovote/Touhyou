<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>プロフィール編集画面</title>
</head>
	
<body>


	<?php
		//データベースに接続
		require_once('include_path.php');
		require_once('db.php');
	
		
		echo '<p>参加者一覧画面</p>';
		
			//トップ画面へのリンク
		echo '<p><a href="kanri_top.html">トップへ戻る</a>';
		echo '<a href="profile_insert.php?id=1" >/プロフィールの追加</a>';
		echo '<a href="profile_insert.php?id=2" >/ジャンルの追加</a>';

	
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru";
		$result = mysqli_query($dbc, $query);
		
	
		// 取得したデータを一覧表示
		while($row = mysqli_fetch_array($result)){
			
			//表示処理
			$jid = $row['j_id'];
			$jname = $row['j_name'];
			
			echo '<a href="profile_select.php?jid=' .$jid.'" ><p>'.$jname.'</p></a>';
		}
	
	
			

	?>
</body>
</html>
