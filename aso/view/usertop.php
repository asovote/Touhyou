<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
<link type="text/css" rel="stylesheet" href="./user.css">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>HTML5とCSS3でスマホサイト - WEB DESIGN LAB</title>
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

<body style="background-image:url(背景2.png);background-attachment:fixed; class="img">

</body>

<body>

	<?php
		//データベースに接続
		ini_set('include_path', '/xampp/htdocs/aso/classes/');
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		echo '<div id="kara">&nbsp</div>';
		echo '<p1 id="heading07">投票ページ</p1>';
		echo '<div id="kara">&nbsp</div>';

	
			
		
		
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru ;";
		$result = mysqli_query($dbc, $query);
		
		
			echo '<form action="data.php" method="POST">';
			
			
			while($row = mysqli_fetch_array($result)) {
			echo '<ul class= "menu4">';
				
				echo '<name="janru">';	
					$janru_id = $row['j_id'];
					$j_name = $row['j_name'];
			echo '<value='.$janru_id.'>';
			
			echo '<button><span id="buttonImage"><li><a href= "data.php">'.$j_name.'</a></li></span></button>
			</ul>';
			
			

			}
			echo '</form>';
		
	?>
    
    
    
</body>
</html>


