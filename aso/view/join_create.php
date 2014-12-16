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


$sql ="select j_name as genru from janru where genru = ?";
//重複していないかチェックのため。
//$stmt = $dbh->query($sql);
$stmt = $dbh->prepare($sql);
$stmt -> execute(array($gname));

  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
  	print($result[0]);
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