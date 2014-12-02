<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Title</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
    
	<body>
  <body style="background-image:url(背景2.png);background-attachment:fixed;">
    <div class="container">  
    <h1 align="center">出演者詳細</h1>

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
	if(isset($mid)){
	
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru,mj_list,member where member.m_id = mj_list.m_id and mj_list.j_id = janru.j_id and member.m_id=".$mid.";";
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
			$mjanru = $row['j_name'];
			$mfree = $row['free'];
			$mimg = $row['m_img'];
      echo'<div class="row">';        
      echo'<form action="#.php" method="POST">';
      echo'<div class="col-lg-3 col-sm-4 col-xs-6"><img class="thumbnail img-responsive" src="img/'.$mimg.'"></div><!--SQLで撮ってきた画像に差し替え-->';
      echo'<div class="col-lg-3 col-sm-4 col-xs-6">'; echo $mname;
      echo'<div align="center" valign="bottom"><input type="button" value="戻る" onclick="history.back()"><input type="submit"value="投票">';
      echo'</div></div>';
      echo'</div><div class="row">';
      echo'</div></div>';
      echo'<div class="container">';
      echo'<p>学校:'.$school.'</p>';
      echo'<p>'.$mfree.'</p>';
      echo'</div>';
			
		}
	}
	}else if(isset($jid)){
	}
?>
	</body>
    
</html>