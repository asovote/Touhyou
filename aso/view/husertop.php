<meta name="viewport"content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link media="only screen and (max-device-width:480px)"href="smart.css" type="text/css" rel="stylesheet" />
<link media="screen and (min-device-width:481px)" href="design.css"type="text/css" rel="stylesheet" />
<!--[if IE]>
<link href="design.css" type="text/css" rel="stylesheet" />
<![endif]-->






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
<link type="text/css" rel="stylesheet" href="./user.css">
<meta name="viewport"content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link media="only screen and (max-device-width:480px)"href="vote_phone.css" type="text/css" rel="stylesheet" />
<link media="screen and (min-device-width:481px)" href="vote_pc.css"type="text/css" rel="stylesheet" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

</head>

<body style="background-image:url(img/123.png);background-attachment:fixed;">
	<?php

	?>

	<?php
		//データベースに接続
	//	ini_set('include_path', '/xampp/htdocs/aso/classes/');
		$classDir = __DIR__ . "/../class/";
		//require_once('include_path.php');
		require_once($classDir . 'db.php');
		require_once($classDir . 'session_start.php');
		
	        echo '<p class="head"><img src="img/2222.png"alt=""/></p>';
		echo '<div id="btb2" align="center"></div>';
		header('Expires:-1');
		header('Cache-Control:');
		header('Pragma:');

		unset($_SESSION['jid']);
		
		// Cookieが無効の場合
		if(!isset($_COOKIE['use_cookie'])){
			setcookie("use_cookie",'true',time()+60*60*24*1);
			//$_SESSIONの値がない場合
			if(!isset($_SESSION['cookie_ch'])){
				//$_GETの値がない場合
				if(!isset($_GET['ch'])){
		   			header('Location: /usertop.php?ch=1');
		   			exit;
				}else{
				$_SESSION['cookie_ch']=1;
				echo 'Cookieを有効にしてください。';
				}
			}else{
			unset($_SESSION['cookie_ch']);
   			header('Location: /usertop.php?ch=1');
		   	exit;
			}
		//Cookieが有効の場合
		}else if(isset($_COOKIE['use_cookie'])){
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru where jtime ='0';";
		$result = mysqli_query($dbc, $query);
		while($row = mysqli_fetch_array($result)) {
		echo '<div class= "menu4">';	
			echo '<name="janru">';	
				$janru_id = $row['j_id'];
				$j_name = $row['j_name'];
		echo '<value='.$janru_id.'>';
		echo '<form action="data.php" method="POST">';
		echo '<p class="bt">';
		echo '<a href="data.php" style="text-decoration:none; link="#000000" alink="#ff0000"><b>'.$j_name.'</b></a>';
		echo '<input type="image" src="img/noun_63654_cc.png" width="20" height="30"  alt=""/>';
		echo '</p>';
		echo '<input id="subbtn" type="hidden" name="jid" value="'.$janru_id.'">';
		echo '<input id="subbtn" type="hidden" name="jname" value="'.$j_name.'">';
		echo '</div></div></div>';
		echo '</form>';
		}
		
		
		
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru where jtime ='2';";
		$result = mysqli_query($dbc, $query);
		
		if(mysqli_fetch_row($result) != 0){
		
			 echo '<p class="head"><img src="img/rank.png"alt=""/></p>';
			 echo '<div id="btb2" align="center"></div>';
			mysqli_data_seek($result,0);
			
			while($row = mysqli_fetch_array($result)) {
			echo '<div class= "menu4">';	
				echo '<name="janru">';
					$janru_id = $row['j_id'];
					$j_name = $row['j_name'];
			echo '<value='.$janru_id.'>';
			echo '<form action="user_result.php" method="POST">';
			echo '<p class="bt">';
			echo '<a><b>'.$j_name.'</b></a>';
			echo '<input type="image" src="img/noun_63654_cc.png" width="20" height="30"  alt=""/>';
			echo '</p>';
			echo '<input id="subbtn" type="hidden" name="jid" value="'.$janru_id.'">';
			echo '<input id="subbtn" type="hidden" name="jname" value="'.$j_name.'">';
			echo '</div></div></div>';
			echo '</form>';
			}
		}
		
		}else{
			 echo 'Cookieを有効にしてください。';
		}
	?>
        
</body>
</html>


