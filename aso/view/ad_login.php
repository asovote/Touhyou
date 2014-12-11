<?php
  session_start();

require_once('include_path.php');
require_once('db.php');

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
		
		echo "ID、パスワードを入力してください。";

	

		}else if (mysql_num_rows($result) == 1){
			
	    		$row = mysql_fetch_assoc($result);
	    		$_SESSION["ad_id"] = $row["ad_id"];
	    		$_SESSION["pw"] = $row["pw"];
			//	print($_SESSION['ad_id'].":".$_SESSION['pw']);
	 	 	header('Location: ./kanri_top.php');
		
		
		} else if (mysql_num_rows($result) == 0) {

		      echo "ID、またはパスワードが間違っています。";
		      
	    

		}



  $con = mysql_close($con);
  if (!$con) {
    exit('データベースとの接続を閉じられませんでした。');
  }
}

?>
<html>
<head>
<title>投票システム</title>


<script type="text/javascript"> 
<!-- 
function check() {

	var flag = 0;

	if (document.ad_id.ad_id.value.match(/[^0-9]+/)) {

		flag = 1;

	}
	else if (document.ad_id.pw.value.match(/[^0-9]+/)) {

		flag = 1;

	}

	if (flag) {

		window.alert('数字以外が入力されています。');

		return false;

	}
	else {
		
		return true;

	}
}

</head>
<body>

<form method="POST" action="ad_login.php" name="ad_login" onSubmit="return check()">

<meta http-equic="Content-Type" content="text/html; charset=utf-8" />

		<div align="center"><br><br>	 
		<p><center>管理者IDと管理者パスワードを入力してください。</center></p><br>
		
		 <table border="1" align="center">
		 
		  <tr>
		    <td>管理者ID</td>
		　　<td><input pattern="^[0-9]+$" maxlenght="4" name="ad_id"></td>
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