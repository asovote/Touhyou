<html>
<head>
</head>
<body>
<script>

var timer1; //タイマーを格納する変数（タイマーID）の宣言

/*	var data = location.search.substring(1, location.search.length);
		//エスケープされた文字をアンエスケープする
	data = unescape(data);
	document.write(data);
*/

//タイマーの値を設定する関数
function data(){
        if(window.location.search){

	    //?（文字列のインデックスが1）以降の値（文字列）を取得
            var param=window.location.search.substring(1,window.location.search.length);
	    param = decodeURIComponent(param);
	    //pformフォームのpnameテキストボックスに表示
            var b = param.split('&');
		if(b != '') {
		    for(var i = 0; i < b.length; i++) {
	//	    param[i+1] = b[i];
	//	    document.write(param[i]);
		    var element = b[i].split('=');
		    var param1 = decodeURIComponent(element[0]);
		    var param2 = decodeURIComponent(element[1]);
		    var param3 = decodeURIComponent(element[2]);

	//	    document.write(i + 1 + '番目: ' + b[i] + '<br>');
		    }
		}
	//判定処理
	if(param3==0){
        //DBを動かす（"0"）かの判定
 	location.href = "test2.php?&" + escape(param1) +"="+ escape(param2);
       
        }else if(param3==1){
        //DBを止める（"1"）かの判定
  	location.href = "test3.php?&" + escape(param1) +"="+ escape(param2);
       
        }else if(param3==3){
         //textBoxの値を代入する（param1の値を分に代入）
           document.timer.elements["hun"].value= param1;
           document.timer.elements["sec"].value= param2;
        //DBスタート
        cntStart();
        
        }else if(param3==4){
         //textBoxの値を代入する（param1の値を分に代入）
           document.timer.elements["hun"].value= param1;
           document.timer.elements["sec"].value= param2;
        //DBストップ
        cntStop();
        }

        }
    }
    window.onload=data;


//カウントダウン関数を1000ミリ秒毎に呼び出す関数
function cntStart()
{
  //location.href = "test2.php?&" + escape(document.timer.hun.value) +"="+ escape(document.timer.sec.value);
document.timer.elements[2].disabled=true;
timer1=setInterval("countDown()",1000);
}

//タイマー停止関数
function cntStop()
{
  document.timer.elements[2].disabled=false;
  clearInterval(timer1);
//  location.href = "test2.php?" + escape(document.timer.sec.value);
//  location.href = "test.php?&" + escape(document.timer.hun.value) +"="+ escape(document.timer.sec.value) + "="+ escape(1);
  

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
    alert("投票を締切ます！");
    //データを次のファイルにエスケープして渡す
  location.href = "isitime.php?&" + escape(document.timer.hun.value) +"="+ escape(document.timer.sec.value) + "="+ escape(1);
    
 

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

function Start(){
  location.href = "isitime.php?&" + escape(document.timer.hun.value) +"="+ escape(document.timer.sec.value) + "="+ escape(0);
//	cntStart();
}

function Stop(){
  location.href = "isitime.php?&" + escape(document.timer.hun.value) +"="+ escape(document.timer.sec.value) + "="+ escape(1);
//	cntStart();
}


</script>


<form name="timer" >

<input type="text" id = "hun" name ="test1">分
<input type="text" id = "sec" name ="test2">秒<br>
<input type="button" value="スタート" onclick="Start()">
<input type="button" value="ストップ" onclick="Stop()">

</form>

</body>
</html>