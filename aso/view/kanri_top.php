<?php
session_start();
if($_SESSION['ad_id'] == null){
header('Location: /ad_login.php');
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理＿top</title>
<style type="text/css">
</style>
</head>

<body>

<body style="background-image:url(背景2.png);background-attachment:fixed;">

<div id="header">
  <center><p>投票システム</p></center>
</div>
<center><p1>管理者メニュー</p1></center>
<div id="main">
  <center>
    <!--<p><a href="select_janru.php">
      <input type="button" name="button" id="button" style="color:blue;" value="投票結果確認">
    </p> -->
    <p><a href="select_janru_manage.php">
      <input type="button" name="button2" id="button2" style="color:blue;" value="中間状況確認">
    </p>
    <p><a href="janru_top.php">
      <input type="button" name="button4" id="button4" style="color:blue;" value="出演者一覧">
    </p>
    <p><a href="sessionout.php">
      <input type="button" name="button4" id="button4" style="color:blue;" value="ログアウト">
    </p>
    
  </center>
</div>
</body>
</html>
