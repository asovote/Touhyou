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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/jquery.minimalect.min.css" media="screen" />
<script type="text/javascript" src="js/jquery.minimalect.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
</script>
<script src='js/customSelect.jquery.js'></script>
</head>

<body>


<form method="post" action="/join_post.php">

<select name="genre1" size="3">
            
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

<select name="genre2" size="3">
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
</html>
<?php
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
?>