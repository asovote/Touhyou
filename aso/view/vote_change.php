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

$mysqli = new mysqli('localhost', 'root', '');
if ($mysqli -> connect_errno) {
	print('<p>データベースへの接続に失敗しました。</p>' . $mysqli -> connect_error);
	exit();
}
$mysqli -> select_db('test');
$mysqli -> set_charset("utf-8");

(int)$votes = $_POST['Vtext'];

$changeVplus = "update member set votes_manage = votes_manage + " . $votes . " where m_id = " . $m_id ;
$changeVminus = "update member set votes_manage = votes_manage - " . $votes . " where m_id = " . $m_id ;


printf($_POST['Vtext']);
if (isset($_POST["Vtext"])) {

    $zougen = htmlspecialchars($_POST["VVV"], ENT_QUOTES, "UTF-8");
    switch ($zougen) {
        case "追加":
        
        $result = $mysqli -> query($changeVplus);
        printf('票追加しました。');
        printf('3秒後に自動で移動します。');
        
        break;
        case "削除":
        
        $Vresult = $mysqli -> query($changeVminus);
        printf('票削除しました。');
        printf('3秒後に自動で移動します。');
        
        
        
        break;
        default: echo "error"; exit;
    }
}else{
printf('数値を入力してください。');
}

$votes = 0;

?>

</form>
</body>
</html>