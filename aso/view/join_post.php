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
if(!isset($_POST['genre1'])){
		header("Location: /join.php");
}else{
?>
<body>
<div id="content">
<div id="obj">
<form method="post" action="join_create.php">
<input type="text" name="gname">
<input type="hidden" name="genre1" value="<?php echo $_POST['genre1'] ?>">
<input type="hidden" name="genre2" value="<?php echo $_POST['geren2'] ?> ">
<input type="submit">

</form>
</div>
<?php
$sql = 'SELECT mj_list.m_id,member.name,mj_list.j_id,janru.j_name as genre,mj_list.votes FROM touhyou.mj_list,touhyou.member,touhyou.janru where mj_list.m_id = member.m_id
and mj_list.j_id = janru.j_id and mj_list.j_id in (?,?) order by votes desc';
$stmt = $dbh->prepare($sql);
//$stmt -> execute(array(15,15));
$genre = $_POST['genre1'];
$genre2 = $_POST['genre2'];
$stmt -> execute(array($genre,$genre2));
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        print("id:".$result['m_id']);
        print("name:".$result['name']);
		print("genreid:".$result['j_id']);
		print("genrename:".$result['genre']);
		print("votes:".$result['votes']);
		print('<BR>');
    }  
}

?>





</body>
</html>
<?php
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
?>