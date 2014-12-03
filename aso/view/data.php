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
<body style="background-image:url(背景2.png);background-attachment:fixed;">
<?php	
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');


$jid = $_POST['jid']; //スレッドID

if(isset($_COOKIE[$jid])){ 
 	
	header("Location: usertop.php");
}
?>
<div class="container">
    <h1 align=center>出演者一覧</h1>
<input type="button" value="戻る" onclick="history.back()">

<?php




		//データベースにつなぐ
		
		if(isset($_POST['jid'])){
		$janru = $_POST['jid'];
		}else{
		header("Location: usertop.php");
		}
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru,mj_list,member where member.m_id = mj_list.m_id and mj_list.j_id = janru.j_id and janru.j_id=".$janru.";";
		$result = mysqli_query($dbc, $query);
	       
		while($row = mysqli_fetch_array($result)){
			
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$jid = $row['j_id'];
 			$mimg = $row['m_img'];
			$_SESSION['jid'] = $jid;
			?>
            <!--実際に使う際はここをループさせて表示します-->
<?php 
          echo'<div class="row">';
		  echo '<form action="update.php" method="POST">';
      		  echo'<div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="u_profile_select.php?mid=' .$mid.'"><img class="thumbnail img-responsive" src="img/'.$mimg.'"width="600" height="350" ></a></div><!--SQLで撮ってきた画像に差し替え-->';
		  echo'<div class="col-lg-3 col-sm-4 col-xs-6">'; echo'<h3>'.$mname.'</h3>';
		  echo'<div align="center" valign="bottom"><input type="submit"value="投票" onClick="submitChk();"><input type="hidden" name="mid" value="'.$mid.'"><input type="hidden" name="jid" value="'.$jid.'"></form>';
                  echo'</div>  <!--ここで戻るボタンと投票ボタンを置く形になるはずです--></div>';
		  echo'</div></div>';
		} 


?>    
	</body>
    
</html>