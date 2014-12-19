<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理者 | ログイン</title>

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
      </div>
    </nav>
    <div class="container">
      <header class="jumbotron">
        <h1>麻生祭投票システム</h1>
        <p>投票を管理するためにログインしてください。</p>
      </header>   
      <section>
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-body">
                <p>2014/12/17 test</p>
                <p>2014/12/17 test</p>
                <p>2014/12/17 test</p>
                <p>2014/12/17 test</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <form method="POST" action="./php/LoginOperation.php">
              <input type="text" name="userName" class="form-control" placeholder="Username"style="margin-bottom:20px">
              <input type="password" name="password" class="form-control" placeholder="Password" style="margin-bottom:20px">
              <input type="submit" value="認証" class="btn btn-primary">
            </form>
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
  </body>
</html>
