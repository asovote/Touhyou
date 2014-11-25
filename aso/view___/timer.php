<html>
<head>
</head>
<body>
<script>

var timer1; //タイマーを格納する変数（タイマーID）の宣言


//カウントダウン関数を1000ミリ秒毎に呼び出す関数
function cntStart()
{
  


document.timer.elements[2].disabled=true;
  timer1=setInterval("countDown()",1000);


}

//タイマー停止関数
function cntStop()
{
  document.timer.elements[2].disabled=false;
  clearInterval(timer1);
}

//カウントダウン関数
function countDown()
{
  var min=document.timer.elements[0].value;
  var sec=document.timer.elements[1].value;
  
  if( (min=="") && (sec=="") )
  {
    alert("時刻を設定してください！");
    reSet();
  }
  else
  {
    if (min=="") min=0;
    min=parseInt(min);
    
    if (sec=="") sec=0;
    sec=parseInt(sec);
    
    tmWrite(min*60+sec-1);
  }
}

//残り時間を書き出す関数
function tmWrite(int)
{
  int=parseInt(int);
  
  if (int<=0)
  {
    reSet();
    alert("時間です！");
    header('Location:stimer.php'); 
  }
  else
  {
    //残り分数はintを60で割って切り捨てる
    document.timer.elements[0].value=Math.floor(int/60);
    //残り秒数はintを60で割った余り
    document.timer.elements[1].value=int % 60;
  }
}

//フォームを初期状態に戻す（リセット）関数
function reSet()
{
  document.timer.elements[0].value="0";
  document.timer.elements[1].value="0";
  document.timer.elements[2].disabled=false;
  clearInterval(timer1);
}  
</script>

<!--	<?php
		if(isset($_POST['stime'])){
		//データベースに接続
		ini_set('include_path', '/xampp/htdocs/aso/classes/');
		require_once('include_path.php');
		require_once('db.php');
		require_once('session_start.php');
		
		//javascriptから値をとってくる
		
		$jtime = 1;
		
		//$jtime = $_POST['stime'];
		
		
		//SQL文の格納
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "update janru set jtime=".$jtime." where j_id = 5";
		$result = mysqli_query($dbc, $query);
		if($jtime=0){
			
			}
		//header('Location:timer.php');
		
		}else{}

	?>
-->









<input type="text" value="">分
<input type="text" value="">秒<br>

<form name="timer" action="timer.php" method="post">
<input type="hidden" name="stime" value="0" >
<input type="button" value="スタート" onclick="cntStart()">

</form>

<form name="timer" action="timer.php" method="post">
<input type="hidden" name="stime" value="1" >
<input type="button" value="ストップ" onclick="cntStop()">

</form>

</body>
</html>den" name="stime" value="1" >
</form>

</body>
</html>