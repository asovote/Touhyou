<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>プロフィール編集画面</title>
<link type="text/css" rel="stylesheet" href="./main.css">
</head>
	
<body>

<body style="background-image:url(背景2.png);background-attachment:fixed;">



  <?php
  		session_start();
		if($_SESSION['ad_id'] == null){
		header('Location: /ad_login.php');
		}

		error_reporting(0);

  
		//データベースに接続
		require_once('include_path.php');
		require_once('db.php');

		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);

		
	echo '<div id="tag">';
		echo '<p><a href="kanri_top.php">トップへ戻る</a>';

		echo '<a href="profile_insert.php?id=1" >/プロフィールの追加</a>';
		echo '<a href="profile_insert.php?id=2" >/ジャンルの追加</a>';
	echo '</div>';	
		
	echo '<div id="top">';
		
		echo '<p>参加者一覧画面</p>';
	echo '</div>';	
			//トップ画面へのリンク
		
	
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru";
		$result = mysqli_query($dbc, $query);
		
		$chang='on';
	
		// 取得したデータを一覧表示
		while($row = mysqli_fetch_array($result)){
			
			//表示処理
			$jid = $row['j_id'];
			$jname = $row['j_name'];
			
			
			
			

		echo '<div1 class="box1">
			<ul>
			<li class="'.$chang.'"><a href="janru_top.php?jid=' .$jid.'" >'.$jname.'</a></li>
			</ul>
		</div1>';
				
			if($chang='on'){
					$chang='off';
			}else{
				$chang='on';
				}
			
			
			
			
			
			
			
			
		//タブのなかに表示させる
		}echo '<div class="box2">';
		
		
		if(isset($_GET['jid'])){
		$j_id = $_GET['jid'];
		}else if(isset($_GET['mid'])){
		$mid = $_GET['mid'];
		}else if(isset($_GET['up'])){
		$up=$_GET['up'];
		}else if(isset($_GET['del'])){
		$del=$_GET['del'];
		}else if(isset($_GET['in'])){
		$in=$_GET['in'];
		}
		
		
	if(isset($j_id)){
	unset($_SESSION['member']);
	
		//SQL文の格納
		$query = "select * from member,janru,mj_list where member.m_id = mj_list.m_id and janru.j_id = mj_list.j_id and janru.j_id =" .$j_id. "";
		$result = $dbc -> query($query);
		while($row = $result -> fetch_assoc()){
		$getid = $row['m_id'];
		}
	if($getid == null) {
			//該当する人物が見つからない場合
			echo '<p>該当する人物が見つかりませんでした。</p>';
	} else {
		// 取得したデータを一覧表示
		$result = $dbc -> query($query);
		while($row = $result -> fetch_assoc()){
			
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mimg = $row['m_img'];
			$mfree = $row['free'];
			echo '<a href="janru_top.php?mid=' .$mid.'" ><p>'.$mname.'</p></a>';
		}
	}
	}else if(isset($mid)){
	
	
		//$mid=一覧から選択した人のm_id
		$query = "select * from member,janru,mj_list where member.m_id = $mid and member.m_id = mj_list.m_id and mj_list.j_id = janru.j_id";
		$result = $dbc -> query($query);
		
			while($row = $result -> fetch_assoc()) {
				$_SESSION['member'][$row['m_id']] = array(
				'mid' => $row['m_id'],
				'mname' => $row['name'],
				'mschool' => $row['school'],
				'jname' => $row['j_name'],
				'mfree' => $row['free'],
				'mimg' => $row['m_img'],
				);
			}
			
			//SESSIONでメンバーを作成
			foreach ($_SESSION['member'] as $m_id => $member) {
			 $mname = $member['mname'];
			 $mschool =$member['mschool'];
			 $jname =$member['jname'];
			 $mfree =$member['mfree'];
			
			echo '<div id = "set">';
			echo '<div id="photo">';

			$imgget = "select * from member where m_id =" . $mid; 
			$result = $dbc -> query($imgget);
			while($row = $result -> fetch_assoc()) {
			
			require('imgget.php');
			}
			echo '</div>';
			echo '<div id="ww">';
			echo '<h1><span><p2>名前</p2></span></h1><p3>'.$mname.'</p3><br>';
			echo '<h1><span><p2>学校</p2></span></h1><p3>'.$mschool.'</p3><br>';
			echo '<h1><span><p2>ジャンル</p2></span></h1><p3>'.$jname.'</p3><br>';
			echo '<h1><span><p2>フリーワード</p2></span></h1><p3>'.$mfree.'</p3><br>';
			echo '</div>';		
			echo '<div id="space">&nbsp;</div>';
					
		echo '<div id="tag2">';
		echo '<a href="janru_top.php?up=1">プロフィールの変更</a>';
		echo '</div>';
		echo '&nbsp&nbsp';
		echo '<div id="tag2">';		
		echo '<a href="janru_top.php?del=1">プロフィールの削除</a>';
		echo '</div>';			
		echo '</div>';
			
		}
	}else if(isset($up)){
	require_once('profile_update.php');
	}else if(isset($del)){
	require_once('profile_delete.php');
	}else if(isset($in)){
	require_once('profile_delete.php');
	}
?>
</div>
</body>
</html>
