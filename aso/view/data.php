﻿<!DOCTYPE html>
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
<body style="background-image:url(img/123.png);background-attachment:fixed;">
<?php /*
class SimpleClass
{
public $m_id;
public $name;
public $j_id;
public $m_img;
}*/
?>
<div class="container">
<p class="head"><img src="img/asofes.png"alt=""/></p>
<input type="image" src="img/noun_63651_cc.png" width="20" height="30" onclick="history.back()"></br>
<?php	
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		header('Expires:-1');
		header('Cache-Control:');
		header('Pragma:');


if(isset($_POST['jid'])){
$jid = $_POST['jid']; //スレッドID
$_SESSION['jid']=$jid;
}else if($_SESSION['jid']){
$jid=$_SESSION['jid'];
}else{
echo '値が入っていません';
}

if(isset($_COOKIE[$jid])){ 
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
		
	        //SimpleClassのリストを宣言　sList
	       
		while($row = mysqli_fetch_array($result)){
		
/*		     //SimpleClass を　new する　変数名：sc
		     //scの$m_idに$row['m_id']を入れる
		     //・・
		     //sListにscを追加
		 //}
		 
		 //ｓListにシャッフルをする
		 
		 //for　0番目から、配列の件数までループ
		 //｛
		 　　//sListのi番目を表示
		 
		 //｝
*/			
			//表示処理
			$mid = $row['m_id'];
			$mname = $row['name'];
			$jid = $row['j_id'];
 			$mimg = $row['m_img'];
			$_SESSION['jid'] = $jid;
         	  echo'<div class="row">';
		  echo'<h4><b>'.$mname.'</b></h4>';
		  echo '<form action="update.php" method="POST">';
      		  echo'<div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="un_profile_select.php?mid=' .$mid.'"><img class="thumbnail img-responsive" src="img/'.$mimg.'"width="600" height="350" ></a></div><!--SQLで撮ってきた画像に差し替え-->';
		  echo'<div class="col-lg-3 col-sm-4 col-xs-6">';
		  echo'<div align="center" valign="bottom">';
                  echo'</div>  <!--ここで戻るボタンと投票ボタンを置く形になるはずです--></div>';
		  echo'</div>';
		}
}else{
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
         	  echo'<div class="row">';
		  echo'<h3><b>'.$mname.'</b></h3>';
      		  echo'<div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="u_profile_select.php?mid=' .$mid.'"><img class="thumbnail img-responsive" src="img/'.$mimg.'"width="600" height="350" ></a></div><!--SQLで撮ってきた画像に差し替え-->';
		  echo '<form action="update.php" method="POST" onClick="return submitChk();">';
		  echo'<div class="col-lg-3 col-sm-4 col-xs-6">';
		  echo'<div align="center" valign="bottom"><input type="image" src="img/vote.png"width="20" height="30" ><input type="hidden" name="mid" value="'.$mid.'"><input type="hidden" name="jid" value="'.$jid.'"></form><br>';
                  echo'</div>  <!--ここで戻るボタンと投票ボタンを置く形になるはずです--></div>';
		  echo'</div>';
		}	 
}
?>   </div> </body>
    
</html>