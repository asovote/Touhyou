<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>プロフィール編集画面</title>
</head>
	
<body>
<Div Align="center">

	<?php
		session_start();
if($_SESSION['ad_id'] == null){
header('Location: /ad_login.php');
}

		//データベースに接続
		require_once('include_path.php');
		require_once('db.php');
	
		echo '<p>参加者情報変更画面</p>';
		
		//トップ画面へのリンク
		echo '<p><a href="kanri_top.php">トップへ戻る</a>';
		echo '<a href="profile_delete.php">/プロフィールの削除</a>';
		
		if(!isset($_POST['fase1'])){
			if(!isset($_SESSION['member'])) {
		                //カートに商品が無い場合
		                echo "メンバーが入っていません。";
	           	 } else {
	           	 
	           	 //値の表示をし登録前の画面の表示
	           	 
			 $dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
			 $query = "select * from janru ;";
			 $result = mysqli_query($dbc, $query);
			
	           	
			//SESSIONのメンバーからデータを取得
			foreach ($_SESSION['member'] as $m_id => $member) {
			 $mid = $member['mid'];
			 $mname = $member['mname'];
			 $mschool =$member['mschool'];
			 $jname =$member['jname'];
			 $mfree =$member['mfree'];
			}
		
			echo '<form action="profile_update.php" method="POST">';
			echo '<p>氏名：<input type="text" name="name" value="'.$mname.'"/></p>';
			echo '<p>学校：<input type="text" name="school" value="'.$mschool.'"/></p>';
			echo '<p>ジャンル：<select name="janru" value="'.$jname.'">';
		
			while($row = mysqli_fetch_array($result)) {
				$janru_id = $row['j_id'];
				$j_name = $row['j_name'];
				echo '<option value='.$janru_id.'>'.$j_name.'</option>';		
			}
			
			echo '</select></p>';
		
			echo '<p>フリー： ※300文字以内</p><textarea name="free" cols="30" rows="5">'.$mfree.'</textarea>';
			
			echo '<p>写真：<input type="file" name="upfile" /></p>';
			
			echo '<input type="submit" value="登録" name="fase1" />';
			echo '<input type="reset" value="リセット" />';
			
			echo '</form>';
			
			}
	}else{
		     //登録画面
			foreach ($_SESSION['member'] as $m_id => $member) {
			 $mid = $member['mid'];
			
			}
			$name = $_POST["name"];
			$school = $_POST["school"];
			$free = $_POST["free"];
			//$j_id = $_POST["janru"];

		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		    //通常時の処理
                    //SQL文格納（UPDATE）
                    $query = "UPDATE member SET name = '$name',
                    				school = '$school',
                    				free = '$free' WHERE m_id = '$mid'";
                    //SQL文実行
                    $result = mysqli_query($dbc, $query);

                    //自分自身を検索
                   	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
			$query = "select * from member,janru 
				where member.m_id = '$mid' and member.janru = janru.j_id ";
			$result = mysqli_query($dbc, $query);
			
		
			// 取得したデータを一覧表示
			//arrayのデータ数分繰り返し、表示する
			while($row = mysqli_fetch_array($result)) {
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mjanru = $row['janru'];
			$jname = $row['j_name'];
			$mfree = $row['free'];
			
			echo '<p>名前：'.$mname.'</p>';
			echo '<p>学校：'.$mschool.'</p>';
			echo '<p>ジャンル：'.$jname.'</p>';
			echo '<p>フリーワード：'.$mfree.'</p>';
			}
                    $result = mysqli_query($dbc, $query);
                    //データベースとの接続を切断
                    mysqli_close($dbc);

                    if(!mysqli_num_rows($result) == 1) {
                        //update処理失敗時の処理
                        echo 'データの更新に失敗しました。しばらくお待ちの上再度お試し下さい。<br />';
		
		}
	}
	
	
	
	?>
	
	</div>
</body>
</html>
