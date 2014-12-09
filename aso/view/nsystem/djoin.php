<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php
require_once('include_path.php');
require_once('db.php');
//$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);

try{
    $dbh = new PDO(db_host,db_user, db_pass);
	print('接続に成功しました。<br>');
	$dbh->query('SET NAMES utf8');
	
	
	
	
	
	
	
	
	
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

?>





</body>
</html>