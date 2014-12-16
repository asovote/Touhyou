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
$genre = $_POST['genre1'];
$genre2 = $_POST['genre2'];
//postデータをキャッチ。


$sql ="select count(j_name) as gc from janru where j_name = ?";
//重複していないかチェックのため。
//$stmt = $dbh->query($sql);
$stmt = $dbh->prepare($sql);
$stmt -> execute(array($gname));

 $result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result['gc'] > 0){
	//うぉーにん！重複しているときは、進めませんよ。
	print("重複しています。ジャンル名を変えてください。");
	
}else{
	//正常なときの処理がはじまりますよ！
$sql = "insert into janru(j_name) values(?)";
$stmt = $dbh->prepare($sql);
$stmt -> execute(array($gname));

$lastsql = "select j_id from janru order by j_id DESC";
$stmt = $dbh->prepare($sql);
$stmt -> execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$genreid = $result['j_id'];



$sql = null;
$sql = "insert into mj_list(m_id,j_id,votes) select member.m_id,?,mj_list.votes from member,mj_list where member.m_id = mj_list.m_id and mj_list.j_id in (?,?)";
$stmt = $dbh->prepare($sql);
$stmt -> execute(array($genreid,$genre,$genre2));


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