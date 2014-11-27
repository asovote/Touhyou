<!doctype html>
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
<h2>プロフィール参照</h2>
<?php

		//データベースにつなぐ
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		if(isset($_GET['janru'])){
		$janru = $_GET['janru'];
		$_SESSION['janru'] = $janru;
		}else{
		$janru = $_SESSION['janru'];
		}
		
				
		echo '<form action="usertop.php" method="POST">';
		echo '<input type="submit" value="戻る" />';

		
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select j_name from janru where j_id='$janru'";
		$result = mysqli_query($dbc, $query);
		
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from member where janru='$janru'";
		$result = mysqli_query($dbc, $query);
		
		
		while($row = mysqli_fetch_array($result)){
			
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mjanru = $row['janru'];
			$mfree = $row['free'];
			
			
			echo'<script type="text/javascript">
	    /**
	     * 確認ダイアログの返り値によりフォーム送信
	    */
	    function submitChk () {
	        /* 確認ダイアログ表示 */
	        var flag = confirm ( "投票してもよろしいですか？");
	        /* send_flg が TRUEなら送信、FALSEなら送信しない */
	        return flag;
	    }
	</script>
        <div class="row"><!--実際に使う際はここをループさせて表示します-->
        <form method="POST" action="insert.php" onsubmit="return submitChk()">
        <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350"></a></div><!--SQLで撮ってきた画像に差し替え-->
        <div class="col-lg-3 col-sm-4 col-xs-6"><a href="user_profile_select.php?mid=' .$mid.'" ><p>'.$mname.'</p></a>
        <div align="center" valign="bottom"><p><input type="submit" name="button2" value="投 票"></p>
        </div>  <!--ここで戻るボタンと投票ボタンを置く形になるはずです--></div>
        </div>   <div class="row"><!--実際に使う際はここをループさせて表示
	<input type="hidden" name="m_id" value="'.$mid.'"></form>	';
	}
		


?>


</body>
</html>