<html>
<head>

<script language="JavaScript">
window.onunload = function(){};
history.forward();
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>投票数管理</title>
<meta http-equiv="REFRESH" content="3;URL=vote_edit_new.php">
</head>
<body>

<!-- <script type="text/javascript" src="js/Vchange_art.js" ></script>
<body onLoad="art()"> -->

<?php

session_start();
$m_id = $_SESSION['m_id'];

require_once('include_path.php');
require_once('db.php');
$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);


(int)$votes = $_POST['Vtext'];

$changeV = "update mj_list set m_votes = " . $votes . " where m_id = " . $m_id ;


printf($_POST['Vtext']);
if (isset($_POST["Vtext"])) {

    $zougen = htmlspecialchars($_POST["VVV"], ENT_QUOTES, "UTF-8");
        
        $result = $dbc -> query($changeV);
        printf('票に変更しました。');
        printf('3秒後に自動で移動します。');
        
}else{
printf('数値を入力してください。');
}

?>

</form>
</body>
</html>