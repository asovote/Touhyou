<?php
require_once './php/DbProfile.php';
session_start();
// ログインしていなければ、ログインページに飛ぶ
if (empty($_SESSION['ad_id']))
	header('Location: /ad_login.php');


if (empty($_GET['member']))
  header('Location: ./error.html');
try {
  $pdo = new PDO(dbDsn, dbAccount, dbPassword);

  // メンバー情報を取得する
  $memInfoStmt = $pdo->prepare('SELECT * FROM member WHERE m_id=?');
  $memInfoStmt->execute(array($_GET['member']));
  $row = $memInfoStmt->fetch(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
  echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

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
            <li><a href="./genre.php?genre=1">出演者一覧を表示</a></li>
            <li><a href="./php/LogoutOperation.php">ログアウト</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <header>
      </header>   
      <section class="row">
        <div class="col-md-3">
          <div class="thumbnail">
          <img src="<?php echo $row['m_img'];?>" alt="...">
          </div>
        </div>
        <div class="col-md-7">
          <div class="caption">
            <div class="panel panel-default">
              <div class="panel-heading">プロフィール情報</div>
              <ul class="list-group">
                <li class="list-group-item">お名前 : <?php echo $row['name']; ?></li>
                <li class="list-group-item">学校 : <?php echo $row['school']; ?></li>
                <li class="list-group-item">説明 : <?php echo $row['free']; ?></li>
              </ul>
            </div>
          </div>
          <a class="btn btn-primary" role="button" href="./editprofile.php?member=<?php echo $row['m_id']; ?>">プロフィール修正</a>
        </div>
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
