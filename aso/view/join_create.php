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

$dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$sql ="select j_name as genru from genru where genru = ?";
//重複していないかチェックのため。
$stmt = $dbh->prepare($sql);
$stmt -> execute(array($gname));
//$result = $stmt->fetch(PDO::FETCH_ASSOC);
$res = $stmt->fetchAll();
//$resnum = count($res);
if($res == 0){
	print("重複なしです。");
}else{
	print("重複しています。$res");
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