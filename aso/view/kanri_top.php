﻿<?php
session_start();
if($_SESSION['ad_id'] == null){
header('Location: http://localhost/aso/view/ad_login.php');
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理＿top</title>
<style type="text/css">
@import url("../../../../../Adobe Dreamweaver CC/tohyo.css");
</style>
</head>

<body>
<header>
  <center><p>投票システム</p></center>
</header>
<p>管理者メニュー</p>
<div id="main">
  <center>
    <p><a href="../../../../../Adobe Dreamweaver CC/kanri_tohyosuu.html">
      <input type="button" name="button" id="button" style="color:blue;" value="投票数管理">
    </a></p>
    <p>
      <input type="button" name="button2" id="button2" style="color:blue;" value="中間状況確認">
    </p>
    <p>
      <input type="button" name="button3" id="button3" style="color:blue;" value="投票期間管理">
    </p>
    <p><a href="syutuensya_top.html">
      <input type="button" name="button4" id="button4" style="color:blue;" value="出演者一覧">
    </p>
    <p>
      <input type="submit" name="submit5" id="submit5" style="color:blue;"onClick="location.href='ad_logout.php'" value="ログアウト" >
    </p>
    
  </center>
</div>
<p>&nbsp;</p>
</body>
</html>
