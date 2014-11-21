<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Script-Type" CONTENT="text/javascript">
<TITLE>次のページに情報を渡す方法</TITLE>
<SCRIPT TYPE="text/javascript">//DBが動いている状態"０"
function DataReceive(){
		//?以降の文字を取得する
	var data = location.search.substring(1, location.search.length);
		//エスケープされた文字をアンエスケープする
	data = unescape(data);
		//アラートで?以降の文字を表示する
//	p = encodeURI(data);
//	document.timer.test2.value=escape(data);
//	document.write(data);
//	location.href = "isitime.php?" + escape(data) +"="+ escape(3);
	location.href = "vote_manage.php?" + escape(data) +"="+ escape(3);


}
DataReceive();
</SCRIPT>
</HEAD>
<BODY>
<!-- PHPで値を表示する処理！！
<?php echo '<SCRIPT TYPE="text/javascript">
document.write(data);</SCRIPT>'
;?>
-->

	<?php
		//データベースに接続
		ini_set('include_path', '/xampp/htdocs/aso/classes/');
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		//DB("0")が動いている状態
		$jtime = 0;
		//$jtime = $_POST['stime'];
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "update janru set jtime=".$jtime." where j_id = 5";
		$result = mysqli_query($dbc, $query);
		if($jtime=0){
			
			}
		
		
	//	echo "データベース更新";
	?>


</BODY>
</HTML