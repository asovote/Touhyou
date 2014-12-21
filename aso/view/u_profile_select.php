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
    <div class="container">
<body style="background-image:url(img/123.png);background-attachment:fixed;">

<table width="100%" border="0" align="center"><tbody>
<tr>
<td align="right" cellspacing="10">
<img src="img/noun_63651_cc.png" width="31" height="42" onclick="history.back()" />
</td>
<td align="center">
<img src="img/asofes.png" width="100%" >
</td>
</tr>
</tbody>
</table>

<div id="probar" align="center"><img src="img/prof.png" alt="" width="100%" >
</div>

<?php
    //データベースに接続
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		header('Expires:-1');
		header('Cache-Control:');
		header('Pragma:');

		if(isset($_SESSION['jid'])){
		$j_id = $_SESSION['jid'];
		}
		if(isset($_GET['mid'])){
		$mid = $_GET['mid'];
		}
		
		
	if(isset($mid)){
	
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from member where m_id = " . $mid;
		$result = mysqli_query($dbc, $query);
		
		if(mysqli_num_rows($result) == 0) {
				//該当する商品が見つからない場合
				echo '<p>該当する人物が見つかりませんでした。</p>';
		} else {
			// 取得したデータを一覧表示
			while($row = mysqli_fetch_assoc($result)){
				
				//表示処理
//				$mid = $row['m_id'];
				$mname = $row['name'];
				$mschool = $row['school'];
//				$jid = $row['j_id'];
				$mfree = $row['free'];
				$mimg = $row['m_img'];
	      echo'<div class="row">';
	      echo'<h3><b>'.$mname.'</b></h3>';
	      echo'<div class="col-lg-3 col-sm-4 col-xs-6">
		  			<img class="thumbnail img-responsive" src="img/'.$mimg.'" width="600" height="350" ></a>
				</div><!--SQLで撮ってきた画像に差し替え-->';
		  echo '<form action="update.php" method="POST" onClick="return submitChk();">';       
		  echo '<dic class="col-lg-3 col-sm-4 col-xs-6">';
	      echo'<div id="voteimg" align="center" valign="bottom">
		  			<input type="image" src="img/vote.png"width="150" height="150" >
					<input type="hidden" name="mid" value="'.$mid.'">
					<input type="hidden" name="jid" value="'.$j_id.'">
					</form><br>';
	      echo'</div>';
	      echo'</div><div class="row">';
	      echo'</div></div>';
	      echo'<div class="container">';
	      echo'<p class="sam1">学校 :  '.$mschool.' ';
	      echo' '.$mfree.'</p>';
	      echo'</div>';
				
			}
		}
	}else if(isset($jid)){
	}
?>
</div>
	</body>
    
</html>