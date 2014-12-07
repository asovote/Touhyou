
<!doctype html>
<html>
    <head>
    	<meta charset="utf-8" />

		
		 
		
		
		

<title>投票システム</title>
<link rel="stylesheet" type="text/css" href="/css/ad_login.css"/>
<?php
  session_start();

require_once('include_path.php');
require_once('db.php');
$errmsg = null;
if (isset($_POST["login"])) {

$ad_id = $_POST['ad_id'];
$pw = $_POST['pw'];
$con = mysql_connect(db_host,db_user,db_pass);


  if (!$con) {
    exit('データベースに接続できませんでした。');
  }

  $result = mysql_select_db(db_name, $con);
  if (!$result) {
    exit('データベースを選択できませんでした。');
  }

  $result = mysql_query('SET NAMES utf8', $con);
  if (!$result) {
    exit('文字コードを指定できませんでした。');
  }

  $result = mysql_query("SELECT * FROM admin WHERE ad_id = $ad_id and pw = $pw" , $con);

 
	   if ($_POST['ad_id'] == "" || $_POST['pw'] == "") {
		
		$errmsg = "ID、パスワードを入力してください。";

	

		}else if (mysql_num_rows($result) == 1){
			
	    		$row = mysql_fetch_assoc($result);
	    		$_SESSION["ad_id"] = $row["ad_id"];
	    		$_SESSION["pw"] = $row["pw"];
			//	print($_SESSION['ad_id'].":".$_SESSION['pw']);
	 	 	header('Location: ./kanri_top.php');
		
		
		} else if (mysql_num_rows($result) == 0) {

		      $errmsg = "ID、またはパスワードが間違っています。";
		      
	    

		}



  $con = mysql_close($con);
  if (!$con) {
    exit('データベースとの接続を閉じられませんでした。');
  }
}

?>
</head>
<body class="small login">
    	
	<div id="header">
		<div class="wrapper">
			<h1>Admin Login</h1>
		</div>
	</div>

<div id="container">
    	<div id="content">
    		<div class="wrapper">
			




			
<form name="ad_login" method="post" action="#">

 <table class="login" style="margin-left: auto; margin-right: auto;">
					<tr>
							<td width="450"><p class="mtop0 mbottom025"><strong><label for="email">UserID</label></strong></p><input id="email" tabindex="1" class="inputtext" type="text" name="ad_id" /></td>
						</tr>
						<tr>
							<td><p class="mtop05 mbottom025"><strong><label for="password">Password</label></strong></p><input tabindex="2" class="inputtext" type="password" name="pw" id="password" />
                            </td>			
</tr>		
<tr>
</tr>
<tr>
<td>
aaaa<?php if($errmsg != null){ echo $errmsg; }; ?>
</td>               											
<tr>
<td style="padding-top: 10px;">
<input class="public-button" type="submit" tabindex="4" value="Login" />
<input class="public-button" type="reset" tabindex="4" value="Reset"></td>
</tr>
</table>
</form>
			
			
		</div> <!-- wrapper -->
		</div> <!-- content -->
</div> <!-- container -->
    </body>
</html>