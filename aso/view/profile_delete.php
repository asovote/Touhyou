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
		//データベースに接続
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
	     	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
	
		echo '<h2>参加者情報変更画面</h2>';
		
		if(!isset($_POST['fase1'])){
			if(!isset($_SESSION['member'])) {
		                //カートに商品が無い場合
		                echo "メンバーが入っていません。";
	           	 } else {
	           	 
			
	           	            	 
			//SESSIONのメンバーからデータを取得
			foreach ($_SESSION['member'] as $m_id => $member) {
			 $mid = $member['mid'];
			 $mname = $member['mname'];
			 $mschool =$member['mschool'];
			 $jname =$member['jname'];
			 $mfree =$member['mfree'];
			}
		
			echo '<form action="janru_top.php" method="POST">';
			echo '<p>氏名：<input type="hidden" name="name" value='.$mname.'/>'.$mname.'</p>';
			echo '<p>学校：<input type="hidden" name="school" value='.$mschool.'/>'.$mschool.'</p>';
			echo '<p>ジャンル：<input type="hidden" name="janru" value='.$jname.'/>'.$jname.'</p>';
			echo '<p>フリー：<input type="hidden" name="free" value='.$mfree.'/>'.$mfree.'</p>';
			
			echo '<input type="submit" value="削除" name="fase1" />';
			
			echo '</form>';
			
			}
		}else{
			foreach ($_SESSION['member'] as $m_id => $member) {
			 $mid = $member['mid'];
			}
			$name = $_POST["name"];
			$school = $_POST["school"];
			$free = $_POST["free"];
			$j_id = $_POST["janru"];
		
		    //通常時の処理
                    //SQL文格納（UPDATE）
                    $query = "DELETE from member WHERE m_id = '$mid';";
                    //SQL文実行
                    $result = $dbc -> query($query);

                    //自分自身を検索
			$query = "select * from member where m_id = '$mid'";
			$result = $dbc -> query($query);
			
		
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
                    $result = $dbc -> query($query);
                    //データベースとの接続を切断
                    mysqli_close($dbc);

                    if(mysqli_num_rows($result) == 1) {
                        //update処理失敗時の処理
                        echo '<p>データの削除に失敗しました。しばらくお待ちの上再度お試し下さい。</p>';
		
		}else{
                        echo '<p>データを削除しました。</p>';
		}
	}
	
	
	
	?>
</Div>
</body>
</html>
