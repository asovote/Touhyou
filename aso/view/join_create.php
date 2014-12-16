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


$sql ="select count(j_name) as gc from janru where j_name = ?";
//重複していないかチェックのため。
//$stmt = $dbh->query($sql);
$stmt = $dbh->prepare($sql);
$stmt -> execute(array($gname));

  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
  	print($result['gc']);
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