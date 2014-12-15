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
	
		
		//トップ画面へのリンク
	//	echo '<p><a href="kanri_top.php">トップへ戻る</a>';

		echo '<h2>参加者情報変更画面</h2>';

		
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
			 $mimg=$member['mimg'];
			}
		
	
function h($str){
	return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

function tag_kyoka($str){
 $search = array('&lt;br&gt;');
 $replace = array('<br>');
return str_replace($search,$replace,$str);
}

			
			echo '<form action="janru_top.php?up=1" method="POST" enctype="multipart/form-data">';
			echo '<p>氏名：<input type="text" name="name" value="'.$mname.'"/></p>';
			echo '<p>学校：<input type="text" name="school" value="'.$mschool.'"/></p>';
			echo '<p>ジャンル：<select name="janru" value="'.$jname.'">';
		
			while($row = mysqli_fetch_array($result)) {
				$janru_id = $row['j_id'];
				$j_name = $row['j_name'];
				echo '<option value='.$janru_id.'>'.$j_name.'</option>';		
			}
			
			echo '</select></p>';
			$mfree = h($mfree);
			$mfree = tag_kyoka($mfree);
			echo '<p>フリー： ※300文字以内</p><textarea name="free" cols="30" rows="5">'.$mfree.''.$mimg.'</textarea>';
			
			echo '<p>写真：<input type="file" name="upfile" size="30" value="'.$_FILES["upfile"]["tmp_name"].'"/></p>';
			
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
			$j_id = $_POST["janru"];

			if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {			
	  			if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "img/". $_FILES["upfile"]["name"])) {
	    			chmod("img/" . $_FILES["upfile"]["name"], 0644);
				header("Location: janru_top.php");
				} else {
				echo '<br>';
				echo "ファイルをアップロードできません。";
				}
			} else {
			echo '<br>';
			echo "ファイルが選択されていません。";
			}


			$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		    //通常時の処理
                    //SQL文格納（UPDATE）
                    $query = "UPDATE member SET name = '$name',
                    				school = '$school',
                    				free = '$free',m_img ='".$_FILES["upfile"]["name"]."'  WHERE m_id = '$mid'";
                    //SQL文実行
                    $result = mysqli_query($dbc, $query);
                    
                    $query = "UPDATE mj_list SET j_id = '$j_id' WHERE m_id = '$mid'";
                    //SQL文実行
                    $result = mysqli_query($dbc, $query);

                    //自分自身を検索
                   //	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
			$query = "select * from member,janru,mj_list
				where member.m_id = '$mid' and mj_list.m_id = member.m_id and mj_list.j_id =janru.j_id ";
			$result = mysqli_query($dbc, $query);
			
		
			// 取得したデータを一覧表示
			//arrayのデータ数分繰り返し、表示する
			while($row = mysqli_fetch_array($result)) {
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mjanru = $row['j_id'];
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
		
					}else{
						echo 'データを更新しました。';
					}
	}
	
	
	
	?>
	
</Div>
</body>
</html>
