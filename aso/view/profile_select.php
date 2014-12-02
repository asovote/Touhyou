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
		require_once('session_start.php');
	
		if(isset($_GET['jid'])){
		$j_id = $_GET['jid'];
		}else if(isset($_GET['mid'])){
		$mid = $_GET['mid'];
		}
		
		echo '<p>参加者情報参照画面</p>';
		
		
	if(isset($mid)){
	
		//トップ画面へのリンク
		echo '<p><a href="kanri_top.html">トップへ戻る</a>';
		
	
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from member where m_id = '$mid'";
		$result = mysqli_query($dbc, $query);
		
	if(mysqli_num_rows($result) == 0) {
			//該当する商品が見つからない場合
			echo '<p>該当する人物が見つかりませんでした。</p>';
	} else {
		require_once('session_out.php');
		// 取得したデータを一覧表示
		while($row = mysqli_fetch_array($result)){
			
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mfree = $row['free'];
			echo '<a href="profile_select.php?mid=' .$mid.'" ><p>'.$mname.'</p></a>';
			echo '<p>名前：'.$mname.'</p>';
			echo '<p>学校：'.$mschool.'</p>';
			echo '<p>ジャンル：'.$mjanru.'</p>';
			echo '<p>フリーワード：'.$mfree.'</p>';
			
		}
	}
	}else if(isset($jid)){
	



	}
		

	?>
</body>
</html>
