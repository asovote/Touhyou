<?php
require_once './php/DbProfile.php';
session_start();
// ログインしていなければ、ログインページに飛ぶ。
if (empty($_SESSION['ad_id']))
  header('Location: /login.php');

// QueryStringsが不正の際はエラーページへ。
if (empty($_GET['genre']))
  header('Location: ./error.html');


// タブにジャンルの項目を列挙するための情報
$pdo = new PDO(dbDsn, dbAccount, dbPassword);
$tabStmt = $pdo->prepare('SELECT * FROM janru;');
$tabStmt->execute();

// ジャンルに所属するメンバーを取得しておく。
$memberStmt = $pdo->prepare('SELECT * FROM janru j, member m, mj_list mj WHERE j.j_id = mj.j_id AND m.m_id=mj.m_id AND j.j_id = ?');
$memberStmt->execute(array($_GET['genre']));  

  
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
          <li><a href="./votestatus.php?genre=<?php echo $_GET['genre'];?>">投票状況確認</a></li>
          <li><a href="./editgenre.php?genre=<?php echo $_GET['genre'];?>">ジャンル情報編集</a></li>
          <li><a href="./editmember.php?genre=<?php echo $_GET['genre'];?>">出演者情報編集</a></li>
            <li><a href="./php/LogoutOperation.php">ログアウト</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <!-- ジャンルによって出演者の表示を変更する -->
      <section>
        <ul class="nav nav-tabs">
        <?php
          $voting = array();
          foreach ($tabStmt as $row) {

            // 投票中のコンテンツがあれば、を通知する。
            if ($row['jtime'] == 0)
              array_push($voting, $row['j_name']);
            if ($row['j_id'] == $_GET['genre']) {
        ?>
        <li role="presentation" class="active"><a href="./genre.php?genre=<?php echo $row['j_id'];?>"><?php echo $row['j_name'];?></a></li>
        <?php
            } else {
        ?>
        <li role="presentation"><a href="./genre.php?genre=<?php echo $row['j_id'];?>"><?php echo $row['j_name'];?></a></li>
        <?php
            }
          }
        ?>
        </ul>
        <div class="alert alert-info" role="alert">
          <b>情報:</b>
          <?php
          foreach ($voting as $vote) {
            echo $vote.' ';
          }
          echo 'の投票を実施中です';
          ?>
        </div>
        <ul class="list-group">
        <?php
        foreach ($memberStmt as $row) {
        ?>
          <li class="list-group-item"><a href="./profile.php?member=<?php echo $row['m_id']?>"><?php echo $row['name'];?></a></li>
        <?php
        }
        ?> 
        </ul>
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
