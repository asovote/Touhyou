<!doctype html>
<html lang="en">
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link type="text/css" href="./styles.css" rel="stylesheet">
		
		
	<script type="text/javascript">
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

</head>

<body>
<p>プロフィール参照</p>
<?php

		//データベースにつなぐ
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		if(isset($_POST['jid'])){
		$janru = $_POST['jid'];
		$_SESSION['jid'] = $janru;
		}else{
		
		}
		
				
		echo '<form action="usertop.php" method="POST">';

		
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru,mj_list,member where member.m_id = mj_list.m_id and mj_list.j_id = janru.j_id and janru.j_id=".$janru.";";
		$result = mysqli_query($dbc, $query);

		while($row = mysqli_fetch_array($result)):
			
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mfree = $row['free'];
			$img = $row['m_img']
		endwhile;


?>

 <div class="row"><!--実際に使う際はここをループさせて表示します-->
        

        
        
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350"></a></div><!--SQLで撮ってきた画像に差し替え-->
      <div class="col-lg-3 col-sm-4 col-xs-6">name
            <div align="center" valign="bottom">戻る　投票
            </div>  <!--ここで戻るボタンと投票ボタンを置く形になるはずです--></div>
        </div>

</body>
</html>