<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>プロフィール編集</title>
</head>
	
<body>
<Div Align="center">

	<?php
		//データベースに接続
	//	ini_set('include_path', '/xampp/htdocs/aso/classes/');
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		echo '<p>参加者情報登録画面</p>';
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}else if(isset($_POST['fase1'])){
			$id = 3;
		}else if(isset($_POST['fase2'])){
			$id = 4;
		}else{
			$id = 0;
		}
		
		if($id == 1){
		//fase2の登録ボタンが押されてないとき
		
		
		
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru ;";
		$result = mysqli_query($dbc, $query);
		
		
			echo '<form action="profile_insert.php" method="POST">';
			
			echo '<p>氏名：<input type="text" name="name" /></p>';
			echo '<p>学校：<input type="text" name="school" /></p>';
			echo '<p>ジャンル：<select name="janru">';
		
			while($row = mysqli_fetch_array($result)) {
				$janru_id = $row['j_id'];
				$j_name = $row['j_name'];
				echo '<option value='.$janru_id.'>'.$j_name.'</option>';		
			}
			
			echo '</select></p>';
		
			echo '<p>フリー： ※300文字以内</p><textarea name="free" cols="30" rows="5"></textarea>';
			
			
			echo '<p>写真：<input type="file" name="upfile" /></p>';
			
			print<<<EOF
			<form action="upload.php" method="post" enctype="multipart/form-data">
			ファイル：<br />
			<input type="file" name="upfile" size="30" /><br />
			<br />
			<input type="submit" value="アップロード" />
			</form>
			EOF;
			
			
			echo '<input type="submit" value="登録" name="fase1" />';
			echo '<input type="reset" value="リセット" />';
			
			echo '</form>';
		
		}else if($id == 3){
		
		//登録ボタンが押されたとき
			
			$name = $_POST["name"];
			$school = $_POST["school"];
			$free = $_POST["free"];
			$j_id = $_POST["janru"];
		
					
			//通常時の処理
			//SQL文格納（INSERT）（※実装時はテーブル名の修正が必要）
			$query = "INSERT INTO member(m_id,name, school,janru, free) 
					VALUE ('', '$name', '$school','$j_id', '$free')";
				
			//SQL文実行
			$result = mysqli_query($dbc, $query);

			$query = "select * from member where name=".$name."and j_id=".$j_id." ;";
			$result = mysqli_query($dbc, $query);
			
			$row = mysqli_fetch_array($result);
			$m_id = $row['m_id'];

			$query = "INSERT INTO mj_list(m_id,j_id)
					VALUE ('$m_id','$j_id')";

			//SQL文実行
			$result = mysqli_query($dbc, $query);

			//自分自身を検索
			$query = "select * from member where janru = '$j_id'";
			$result = mysqli_query($dbc, $query);
			
			
			// 取得したデータを一覧表示
			while($row = mysqli_fetch_array($result)){
				//セッションに格納
				$_SESSION['member'][$row['m_id']] = array(
					'mid' => $row['m_id'],
					'mname' => $row['name'],
					'mschool' => $row['school'],
					'mfree' => $row['free']
				);
				//表示処理
				$mid = $row['m_id'];
				$mname = $row['name'];
				$mschool = $row['school'];
				$mfree = $row['free'];
				echo '<a href="profile_select.php?mid='.$mid.'"><p>'.$mname.'</p></a>';
				
			}
			//データベースとの接続を切断
			mysqli_close($dbc);
			
			require_once('session_out.php');
		
		
		}else if($id == 2){
			
			echo '<form action="profile_insert.php" method="POST">';
			
			echo '<p>ジャンル名：<input type="text" name="janru" /></p>';
		
			echo '<input type="submit" value="登録" name="fase2" />';
			echo '<input type="reset" value="リセット" />';
			
			echo '</form>';
		
		}else if($id == 4){
			//登録ボタンが押されたとき
			
			$jid = $_POST["janru"];
					
			//通常時の処理
			//SQL文格納（INSERT）（※実装時はテーブル名の修正が必要）
			$query = "INSERT INTO janru(j_id, j_name) VALUE ('','$jid')";
			//SQL文実行
			$result = mysqli_query($dbc, $query);
			
			//自分自身を検索
			$query = "SELECT * FROM janru ";
			$result = mysqli_query($dbc, $query);
			
			// 取得したデータを一覧表示
			while($row = mysqli_fetch_array($result)){
				$jid = $row['j_name'];
				
				echo '<p>'.$jid.'<p>';
			}
			
			
		
		}else{
				echo "値が見つかりません";
		}
	

		//トップ画面へのリンク
		echo '<a href="kanri_top.html">トップへ戻る</a>';
	

	?>
	</div>
</body>
</html>
