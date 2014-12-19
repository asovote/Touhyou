<?php
require_once './php/DbProfile.php';
session_start();
// ログインしていなければ、ログインページに飛ぶ。
if (empty($_SESSION['ad_id']))
  header('Location: /login.php');

// ジャンル一覧を取得する
$pdo = new PDO(dbDsn, dbAccount, dbPassword);
$genreStmt = $pdo->prepare('SELECT * FROM janru');
$genreStmt->execute();
$genreResult = $genreStmt->fetchAll(PDO::FETCH_ASSOC);

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
          <li><a href="./editgenre.php">ジャンル情報編集</a></li>
          <li><a href="./php/LogoutOperation.php">ログアウト</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- ジャンルが削除完了したときにアラートを表示する↓ -->
    <?php
    if (isset($_SESSION['deletedGenre'])) {
      unset($_SESSION['deletedGenre']);
    ?>
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <p>正常にジャンルの削除が完了しました。</p>
    </div>
    <?php
    }
    ?>
    <!-- ここまで↑ -->
    <!-- ジャンルが追加が完了したときにアラートを表示する↓ -->
    <?php
    if (isset($_SESSION['addedGenre'])) {
      unset($_SESSION['addedGenre']);
    ?>
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <p>正常にジャンルの追加が完了しました。</p>
    </div>
    <?php
    }
    ?>
    <!-- ここまで↑ -->

    <div class="container">
      <!-- ジャンルによって出演者の表示を変更する -->
      <section class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <!-- ジャンルを追加する -->
          <div class="panel panel-default">
            <div class="panel-heading">ジャンルを追加する</div>
            <div class="panel-body">
              <form action="./php/AddGenreOperation.php" method="GET">
                <input type="text" name="newGenreName"class="form-control" placeholder="新しく追加するジャンルの名前" style="margin-bottom: 20px">
                <input type="submit" class="btn btn-primary" value="確定">
              </form>
            </div>
          </div>
          
          <!-- ジャンルを結合する -->
          <div class="panel panel-default">
            <div class="panel-heading">ジャンルを結合する</div>
            <div class="panel-body">
              <form action="./addgenre.php" method="GET">
                <div class="dropdown" style="padding-bottom:10px;">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    結合するジャンル 
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" id="genre1">
                    <?php
                      foreach ($genreResult as $row) {
                        $genreId = $row['j_id'];
                        $genreName = $row['j_name'];
                        echo "<li><a href=\"#\" data-value=\"$genreId\">$genreName</a></li>";
                      }
                    ?>
                  </ul>
                </div>
                <div class="dropdown" style="padding-bottom:10px;">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    結合されるジャンル 
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" id="genre2">
                    <?php
                      foreach ($genreResult as $row) {
                        $genreId = $row['j_id'];
                        $genreName = $row['j_name'];
                        echo "<li><a href=\"#\" data-value=\"$genreId\">$genreName</a></li>";
                      }
                    ?>
                  </ul>
                </div>
                <input type="hidden" name="srcGenreName" value="">
                <input type="hidden" name="distGenreName" value="">
                <input type="text" name="newGenreName" class="form-control" placeholder="結合後のジャンルの名前" style="margin-bottom: 20px">
                <input type="submit" class="btn btn-primary" value="確定">
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="panel panel-default">
            <div class="panel-heading">ジャンルを削除する</div>
            <ul class="list-group">
              <?php
              foreach ($genreResult as $row) {
                $genreName = $row['j_name'];
                $genreId = $row['j_id'];
                echo"<li class=\"list-group-item\"><a href=\"./askdeletegenre.php?genre=$genreId&genreName=$genreName\">$genreName</li>";
              }
              ?>
            </ul>

          </div>
        </div>
       </section>
    </div>
    <footer>
    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(function(){
      $("#genre1 li a").click(function(){
        $(this).parents('.dropdown').find('.dropdown-toggle').html($(this).text() + ' <span class="caret"></span>');
        $(this).parents('form').find('input[name="srcGenreName"]').val($(this).attr("data-value"));
      });
      $("#genre2 li a").click(function(){
        $(this).parents('.dropdown').find('.dropdown-toggle').html($(this).text() + ' <span class="caret"></span>');
        $(this).parents('form').find('input[name="distGenreName"]').val($(this).attr("data-value"));
      });

    });
    </script>
  </body>
</html>
