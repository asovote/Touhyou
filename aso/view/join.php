<?php

	
	require_once('include_path.php');
	require_once('db.php');
	$flag = 0;
$dsn = 'mysql:dbname='.db_name.';host='.db_host.'';

try{
    $dbh = new PDO($dsn,db_user,db_pass);

	//$dbh->query('SET NAMES utf8');

//$genre = 15;
//$genre2 = 15;
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>


<form method="post" action="#">

<select name="genre1" size="3" multiple>
<?php
$sql = 'select * from janru';
$stmt = $dbh->prepare($sql);
$stmt -> execute();
while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
?>
<option value="<?php echo $result['j_id'] ?>"><?php echo $result['j_name']?></option>
<?php
}
?>

</select>
<select name="genre2" size="3" multiple>
<?php
$sql = 'select * from janru';
$stmt = $dbh->prepare($sql);
$stmt -> execute();
while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
?>
<option value="<?php echo $result['j_id'] ?>"><?php echo $result['j_name']?></option>
<?php
}
?>
</select>
<input type="submit">
</form>
<?php
if($flag == 1){
$sql = 'SELECT mj_list.m_id,member.name,mj_list.j_id,janru.j_name as genre FROM touhyou.mj_list,touhyou.member,touhyou.janru where mj_list.m_id = member.m_id
and mj_list.j_id = janru.j_id and mj_list.j_id in (?,?) order by votes desc';
$stmt = $dbh->prepare($sql);
//$stmt -> execute(array(15,15));
$genre = $_POST['genre1'];
$genre2 = $_POST['genre2'];
$stmt -> execute(array($genre,$genre2));
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        print($result['m_id']);
        print($result['name']);
		print($result['j_id']);
		print($result['genre']);
		print('<BR>');
    }  
}

?>
</html>
<?php
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
?>