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
	<script type="text/javascript">
	    /**
	     * 確認ダイアログの返り値によりフォーム送信
	    */
	    function submitChk() {
	        /* 確認ダイアログ表示 */
	        var flag = confirm ( "投票してもよろしいですか？");
	        /* send_flg が TRUEなら送信、FALSEなら送信しない */
	        return flag;
	    }
	</script>

	</head>
    
	<body>
  <body style="background-image:url(img/123.png);background-attachment:fixed;">
    <div class="container">
<table width="100%"><tbody>
<tr>
<td>
<img src="img/noun_63651_cc.png" width="38" height="42" onclick="history.back()" />
</td>
<td></br></br>
<img src="img/asofes.png" width="100%" >
</td>
</tr>
</tbody>
</table>
<p class="head"><img src="img/prof.png"alt=""/>
</p>

<?php
    //データベースに接続
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		header('Expires:-1');
		header('Cache-Control:');
		header('Pragma:');

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
			// 取得したデータを一覧表示
			while($row = mysqli_fetch_array($result)){
				
				//表示処理
				$mid = $row['m_id'];
				$mname = $row['name'];
				$mschool = $row['school'];
				$jid = $row['j_id'];
				$mfree = $row['free'];
				$mimg = $row['m_img'];
				$_SESSION['jid'] = $row['j_id'];
	      echo'<div class="row">';
	      echo'<h4><b>'.$mname.'</b></h4>';
	      echo'<div class="col-lg-3 col-sm-4 col-xs-6"><img class="thumbnail img-responsive" src="img/'.$mimg.'" width="600" height="350"></div><!--SQLで撮ってきた画像に差し替え-->';
	      echo'<div align="center" valign="bottom"><form action="update.php" method="POST" onClick="return submitChk();"><br>';        
	      //echo'<form action="update.php" method="POST" onClick="return submitChk();">';
	      echo'<div id="voteimg" align="center" valign="bottom"><input type="image" src="img/vote.png"width="150" height="150" ><input type="hidden" name="mid" value="'.$mid.'"><input type="hidden" name="jid" value="'.$jid.'"></form><br>';
	      echo'</div>';
	      echo'</div><div class="row">';
	      echo'</div></div>';
	      echo'<div class="container">';
	      echo'<p>学校:'.$mschool.'</p>';
	      echo'<p>'.$mfree.'</p>';
	      echo'</div>';
				
			}
		}
	}else if(isset($jid)){
	}
?>
</div>
	</body>
    
</html>