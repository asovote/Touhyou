<?php
require_once './php/DbProfile.php';
session_start();
// ログインしていなければ、ログインページに飛ぶ。
if (empty($_SESSION['ad_id']))
  header('Location: /login.php');

// 不正なQueryStringsならジャンル編集ページに送り返す。
if (empty($_GET['genre']) || empty($_GET['genreName']))
  header ('Location: ./editgenre.php');

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理_top</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Vote</a>
        </div>
        <div class="collapse navbar-collapse" id="nav-menu-1">
          <ul class="nav navbar-nav">
          <li><a href="./editgenre.php">ジャンル情報編集</a></li>
          <li><a href="./php/LogoutOperation.php">ログアウト</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <!-- ジャンルによって出演者の表示を変更する -->
      <section class="row">
        <div class="col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-md-10 col-sm-10 col-xs-10">
          <div class="panel panel-warning">
            <div class="panel-heading">警告</div>
            <p><?php echo $_GET['genreName']."を削除しますがよろしいでしょうか。";?></p>
            <p>※ジャンルに所属している出演者や出演者の投票結果も削除されます。</p>
            <a href="./php/DeleteGenreOperation.php?genre=<?php echo $_GET['genre'];?>" class="btn btn-primary" role="button">そのまま<?php echo $_GET['genreName'];?>を削除する</a>
            <a href="./editgenre.php" class="btn btn-default" role="button">キャンセルしてジャンル情報編集へ戻る</a>
          </div>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1"></div>
      </section>
    </div>
    <footer>
    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
