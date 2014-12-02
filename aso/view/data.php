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
	    function submitChk () {
	        /* 確認ダイアログ表示 */
	        var flag = confirm ( "投票してもよろしいですか？");
	        /* send_flg が TRUEなら送信、FALSEなら送信しない */
	        return flag;
	    }
	</script>
	</head>
    
	<body>
<?php

		//データベースにつなぐ
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		if(isset($_POST['jid'])){
		$janru = $_POST['jid'];
		$_SESSION['jid'] = $janru;
		}else{
		header("Location: usertop.php");
		}
        	echo '<form action="usertop.php" method="POST">';

		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru,mj_list,member where member.m_id = mj_list.m_id and mj_list.j_id = janru.j_id and janru.j_id=".$janru.";";
		$result = mysqli_query($dbc, $query);

?>



     <div class="container">
      
    <h1>登録者一覧</h1>
    <div class="row"><!--実際に使う際はここをループさせて表示します-->
        

        
        
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350"></a></div><!--SQLで撮ってきた画像に差し替え-->
      <div class="col-lg-3 col-sm-4 col-xs-6">name
            <div align="center" valign="bottom"><input type="submit"value="投票">
            </div>  <!--ここで戻るボタンと投票ボタンを置く形になるはずです--></div>
        </div>  
    </div>    
        

	</body>
    
</html>