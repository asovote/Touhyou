<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Script-Type" CONTENT="text/javascript">
<TITLE>次のページに情報を渡す方法</TITLE>
<SCRIPT TYPE="text/javascript">//データベースを止める処理"１"
/*function DataReceive(){
		//?以降の文字を取得する
	get_search = document.location.search;
	get_search = get_search.substring(1,get_search.length);
	//アラートで?以降の文字を表示する
	t = get_search.split(",");
	atai = "";
	get_search = "C," + unescape(decodeURIComponent(t[1]));
       	get_search += "," + unescape(decodeURIComponent(t[2]));
	get_search += "," + encodeURIComponent(escape(4));
//	document.write(get_search);
	document.location.href = "test5.php?" + get_search;
	

}
DataReceive();*/
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
		
		//データベース1止まっている状態
		$jtime = 1;
		//$jtime = $_POST['stime'];
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "update janru set jtime=".$jtime." where j_id = 15";
		$result = mysqli_query($dbc, $query);
		if($jtime=0){
			}
		header('Location: /vote_manage.php');
		
	//	echo "データベース更新";
	?>


</BODY>
</HTML