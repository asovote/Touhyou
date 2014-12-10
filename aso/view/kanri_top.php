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
<link rel="stylesheet" type="text/css" href="button.css">
</head>

<body>

<body style="background-image:url(背景2.png);background-attachment:fixed;">

<div id="header">
  <center>
    <p><img src="btn041/222.png" width="515" height="111"  alt=""/></p>
  </center>
</div>
<center><p>管理者メニュー</p></center>
<div id="main">
  <center>
    <p><a href="select_janru_manage.php">
      <input type="image" src="btn041/vote.PNG" alt="投票状況確認">
    </p>
    <p><a href="janru_top.php">
      <input type="image" src="btn041/member.png" alt="出演者一覧">
    </p>
    <p><a href="sessionout.php">
      <input type="image" src="btn041/logout.png" alt="ログアウト">
    </p>
    
  </center>
</div>
</body>
</html>
