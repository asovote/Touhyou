<?php

	
	require_once('include_path.php');
	require_once('db.php');
$dsn = 'mysql:dbname='.db_name.';host='.db_host.'';

try{
    $dbh = new PDO($dsn,db_user,db_pass);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<?php
$gname = htmlspecialchars($_POST['gname'], ENT_QUOTES);
//postデータをキャッチ。


$sql ="select count(j_name) as genru from genru where genru = $gname";
//重複していないかチェックのため。
//$stmt = $dbh->query($sql);
//$stmt = $dbh->prepare($sql);
$count = $dbh->exec($sql);

//$res = $stmt->fetchColumn();
//$resnum = count($res);
if(true){
	print("重複なしです。$count");
}else{
	print("重複しています。$count");
}


?>

<body>
</body>
</html>
<?php
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
?>