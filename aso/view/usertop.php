<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
<link type="text/css" rel="stylesheet" href="./user.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="sample.css"> !-->
 <link rel="stylesheet" href="./user.css" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

</head>

<body>
<body style="background-image:url(img/123.jpg);background-attachment:fixed;">
<?php
		//データベースに接続
	//	ini_set('include_path', '/xampp/htdocs/aso/classes/');
		$classDir = __DIR__ . "/../class/";
		//require_once('include_path.php');
		require_once($classDir . 'db.php');
		require_once($classDir . 'session_start.php');
		
		echo '<p class="head"><img src="img/2222.png"alt=""/></p>';
		echo '<p class="rr"><img src="img/rr.png"alt=""/></p>';
		echo '<div id="btb2" align="center"></div>';	
			
		
		
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru where jtime ='0';";
		$result = mysqli_query($dbc, $query);
		
		
			
			
		/* 投票ページへ */			
		while($row = mysqli_fetch_array($result)) {
			echo '<div class= "menu4">';
				
				echo '<name="janru">';	
						$janru_id = $row['j_id'];
						$j_name = $row['j_name'];
				echo '<value='.$janru_id.'>';
				echo '<form action="data.php" method="POST">';
				echo '<p class="bt">';
					echo '<a>'.$j_name.'</a>';
					echo '<right><img src="img/noun_63654_cc.png" width="20" height="20"  alt=""/></right>';
				echo '</p>';
				echo '<input id="subbtn" type="hidden" name="jid" value="'.$janru_id.'">';
			echo '</div';
			echo '</form>';
		}


		/* 結果発表ページへ */
       
			
		
	?>


	
        
</body>
</html>


