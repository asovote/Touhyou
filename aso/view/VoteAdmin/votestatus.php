<?php
require_once './php/DbProfile.php';
session_start();
// ログインしていなければ、ログインページに飛ぶ
if (empty($_SESSION['ad_id']))
	header('Location: /ad_login.php');

try {
  $pdo = new PDO(dbDsn, dbAccount, dbPassword);
  $stmt = $pdo->prepare('SELECT * FROM janru j, member m, mj_list mj WHERE j.j_id = mj.j_id AND m.m_id = mj.m_id AND j.j_id = ? ORDER BY mj.votes DESC');
  $stmt->execute(array($_GET['genre']));
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
    <title>管理 | 投票状況確認</title>

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
      <section class="row">
        <div class="col-md-8" id="graph">
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">   
            <div class="panel-heading">
              <h3 class="panel-title">投票情報</h3>
            </div>
            <?php
            $totalVotes = 0;
            foreach ($stmt as $row) {
              $totalVotes+=$row['votes'];
              if (empty($genre)) 
                $genre = $row['j_name'];  
              
            }
            ?>
            <ul class="list-group">
            <li class="list-group-item">ジャンル : <?php echo $genre;?></li>
            <li class="list-group-item">総投票数 : <?php echo $totalVotes;?></li>
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
    
    <!-- Include highcharts.js to use graph of pie. -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- Setting graph of pie -->
    <script type="text/javascript">
$(function() {
  $('#graph').highcharts({
    chart: {
      type: 'pie',
    },
    series: [{
      data: [
      <?php
      $i = 0;     // いくつ結果の行が表示されたか
      $stmt->closeCursor();
      $stmt->execute(array($_GET['genre']));
      foreach ($stmt as $graphRow) {
        if ($i == $stmt->rowCount()) {
      ?>
        ['<?php echo $graphRow['name'];?>', <?php echo $graphRow['votes'];?>]
      <?php
      } else {
      ?>
        ['<?php echo $graphRow['name'];?>', <?php echo $graphRow['votes'];?>],
      <?php
      }

      $i++;
      ?>
      <?php
      }
      ?>
      ]
    }]
  });
});
    </script>
  </body>
</html>
