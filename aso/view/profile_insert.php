﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>プロフィール編集</title>
</head>
	
<body>
<Div Align="center">

	<?php
		session_start();
if($_SESSION['ad_id'] == null){
header('Location: /ad_login.php');
}

		//データベースに接続
	//	ini_set('include_path', '/xampp/htdocs/aso/classes/');
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);

		echo '<p>参加者情報登録画面</p>';
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}else if(isset($_POST['fase1'])){
			$id = 3;
		}else if(isset($_POST['fase2'])){
			$id = 4;
		}else {
			$id = 0;
		}
		
		if($id == 1){
		//fase2の登録ボタンが押されてないとき
		
		
		$query = "select * from janru ;";
		$result = mysqli_query($dbc,  $query);
		
		
			echo '<form action="profile_insert.php" method="POST" enctype="multipart/form-data">';
			
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
			echo '<p>写真：<input type="file" name="upfile"  size="30" /></p>';
			
			echo '<input type="submit" value="登録" name="fase1" />';
			echo '<input type="reset" value="リセット" />';
			
			echo '</form>';
		
		}else if($id == 3){
		
		//登録ボタンが押されたとき
			
			$name = $_POST["name"];
			$school = $_POST["school"];
			$free = $_POST["free"];
			$j_id = $_POST["janru"];
			
			
			if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {			
  			if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "img/". $_FILES["upfile"]["name"])) {
    			chmod("img/" . $_FILES["upfile"]["name"], 0644);
			header("Location: janru_top.php");
			} else {
			echo "ファイルをアップロードできません。";
			}
			} else {
			echo "ファイルが選択されていません。";
			}
			
			
			//通常時の処理
			//SQL文格納（INSERT）（※実装時はテーブル名の修正が必要）
			$query = "insert into member(m_id,name,free,m_img,school) VALUES ('', '$name', '$free','" .$_FILES["upfile"]["name"]. "','$school');";
			$result = mysqli_query($dbc, $query);

			//mj_listに格納するm_idを取得
			$query = "select max(m_id) from member;";
			$result = $mysqli->query($dbc, $query);
			while($row = $result -> fetch_array()){			
		 	(int)$mid = $row['max(m_id)'];
		 	}

			$query = "insert into mj_list(mj_id,m_id,j_id,votes) VALUES ('', '$mid', '$j_id',NULL);";
			$result = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($result);



	/*		echo $mid;
			echo $_FILES["upfile"]["name"];
			echo $_FILES["upfile"]["tmp_name"];			
*/

			//データベースとの接続を切断
			
			require_once('session_out.php');
		
		
		}else if($id == 2){
			
			echo '<form action="profile_insert.php" method="POST">';
			
			echo '<p>ジャンル名：<input type="text" name="janru" /></p>';
		
			echo '<input type="submit" value="登録" name="fase2" />';
			echo '<input type="reset" value="リセット" />';
			
			echo '</form>';
		
		}else if($id == 4){
			//登録ボタンが押されたとき
			
			$jname = $_POST["janru"];
			echo $jname;
					
			//通常時の処理
			//SQL文格納（INSERT）（※実装時はテーブル名の修正が必要）
			$query = "INSERT INTO janru(j_id, j_name) VALUES (null,'$jname');";
			//SQL文実行
			$result = mysqli_query($dbc, $query);
			//自分自身を検索
			$query = "SELECT * FROM janru ";
			$result = mysqli_query($dbc, $query);
			header("Location: janru_top.php");
		
		}else{
				echo "値が見つかりません";
		}
	

		//トップ画面へのリンク
		echo '<a href="kanri_top.php>戻る</a>';
	

	?>
	</div>
</body>
</html>
