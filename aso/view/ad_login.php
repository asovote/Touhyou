<?php
  session_start();

require_once('include_path.php');
require_once('db.php');

if (isset($_POST["login"])) {



  $ad_id = $_POST['ad_id'];
  $pw = $_POST['pw'];
  $dbc = mysqli_connect(db_host, db_user, db_pass, db_name);


  $result = mysql_query($dbc , "SELECT * FROM admin WHERE ad_id = '$ad_id' and pw = '$pw'");

 
  	   if ($_POST['ad_id'] == "" || $_POST['pw'] == "") {
		
		echo "ID、パスワードを入力してください。";
		

		}else if (mysql_num_rows($result) == 1){
	    		$row = mysql_fetch_assoc($result);
	    		$_SESSION['ad_id'] = $row['ad_id'];
	    		$_SESSION['pw'] = $row['pw'];
	 	 	header('Location: http://localhost/aso/view/kanri_top.html');
		
		} else if (mysql_num_rows($result) == 0) {

		      echo "ID、またはパスワードが間違っています。";
		      
	    

		}


/**	if (is_numeric($_POST['ad_id']) == false ) {

		header('Location: http://www.msn.com/ja-jp');

	}**/


  $dbc->close();
  if (!$dbc) {
    exit('データベースとの接続を閉じられませんでした。');
  }
}

?>
<html>
<head>
<title>投票システム</title>

</head>
<body>

<form method="POST" action="ad_login.php" name="ad_login">

<meta http-equic="Content-Type" content="text/html; charset=utf-8" />

		<div align="center"><br><br>	 
		<p><center>管理者IDと管理者パスワードを入力してください。</center></p><br>
		
		 <table border="1" align="center">
		 
		 <tr>
		    <td>管理者ID</td>
		　　<td><input type="text" maxlenght="4" name="ad_id" style="ime-mode:disabled"></td>
		 </tr>
		 
		 <tr>
		    <td>管理者パスワード</td>
		    <td><input type="password" maxlenght="4" name="pw" style="ime-mode:disabled"></td>
		 </tr>
		 </table>
		    
		 <div align="center">
			
			<input type="submit" name = "login" value="ログイン">
 
		  
		 </div>
		    
			<align="right"><input type="reset" name="reset" value="リセット">
		  
		 
</form>
</body>
</html>