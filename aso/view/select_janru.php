<html>
<title>
ジャンル選択
</title>
<head>
<link type="text/css" rel="stylesheet" href="./select_janru.css">

</head>
<body>
<body style="background-image:url(背景2.png);background-attachment:fixed;">

<?php
		session_start();
if($_SESSION['ad_id'] == null){
header('Location: /ad_login.php');
}

		echo '<div id="link"><p><a href="kanri_top.php">トップへ戻る</a></p></div>';
		echo '<div id="top"><p1>投票結果画面</p1></div>';

	//ini_set( "display_errors", "Off");
	//require("http://enzerus.com/aso/atack.php");

	require_once('include_path.php');
	require_once('db.php');
	$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
	
	$select_janru_query = "select * from janru";
	$janru_list = $dbc -> query($select_janru_query);
	
	if(!$janru_list){
		printf('query failed.' . $dbc -> error);
		$mysqli -> close();
		exit();
	}
	
	$k = "<br/>";
	echo '<div id="button">';
	while($row = $janru_list -> fetch_assoc()) {
		$j_id = $row['j_id'];
		$j_name = $row['j_name'];
//		printf($j_id);
		$bun1 = "<p><form method=\"post\" action=\"vote_result.php\"></p>";
		$bun2 = "<p><button type =\"submit\" value =%d name =\"select_j\"> %s </button></p>";
		printf($bun1);
		printf($bun2,$j_id,$j_name);
	}
	echo '</div>';

?>

</body>
</html>