<?php

	
	require_once('include_path.php');
	require_once('db.php');
$dsn = 'mysql:dbname='.db_name.';host='.db_host.'';
$user = 'root';
$password = 'lovelive';

try{
    $dbh = new PDO($dsn,db_user,db_pass);

	$dbh->query('SET NAMES utf8');

    $sql = 'SELECT mj_list.m_id,member.name,mj_list.j_id,janru.j_name as genre FROM touhyou.mj_list,touhyou.member,touhyou.janru where mj_list.m_id = member.m_id
and mj_list.j_id = janru.j_id and janru.j_id = ? or mj_list.j_id = janru.j_id and janru.j_id = ? ';

//$genre = 15;
//$genre2 = 15;
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>無題ドキュメント</title>
</head>

<body>
<?php
$stmt = $dbh->prepare($sql);
$stmt -> execute(array(15,15));
  if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        print($result['m_id']);
        print($result['name']);
		print($result['j_id']);
		print($result['genre']);
    }  

?>

<form method="post" action="#">

<select name="genre1" size="3" multiple>
<?php

echo "<option value=\"\">サンプル1</option>";

?>

</select>
<select name="genre2" size="3" multiple>
<?php



?>

</select>

</form>
</html>
<?php
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
?>