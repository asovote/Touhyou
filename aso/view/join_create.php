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

$sql ="select j_name as genru from genru where genru = ?";
//重複していないかチェックのため。
$stmt = $dbh->prepare($sql);
$res = $stmt -> execute(array($gname));
//$result = $stmt->fetch(PDO::FETCH_ASSOC)
if($res->fetch() == 0){
	print("重複なしです。");
}else{
	print("重複しています。");
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