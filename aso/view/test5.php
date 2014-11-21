<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>カウントダウンタイマー</title>
</head>

<body onFocus="check_focus(1)" onBlur="check_focus(0)">

<span id="cdt_title">予定時間</span><br><span id="cdt_timer"></span>

</form>
<h2>タイマーの設定</h2>
<form name="form1" onSubmit="return false;">
<div class="box" id="box1">
<table>
<tr><td align="right" nowrap>表題：</td>
	<td colspan="3" nowrap><input name="text_title" type="text" id="text_title" size="50" maxlength="50">投票締切時間まで</td>
	</tr> 
<tr>
	<td align="right" nowrap>日時：</td>
	<td colspan="3" nowrap><select name="sel_year" id="sel_year" onChange="format_timer_day(0)"></select>年
	<select name="sel_mon" id="sel_mon" onChange="format_timer_day(0)"></select>月
	<select name="sel_day" id="sel_day"></select>日　
	<select name="sel_hour" id="sel_hour"></select>時
	<select name="sel_min" id="sel_min"></select>分</td>
	</tr>

<tr>
	<td align="right">&nbsp;</td>
	<td><input type="button" value="リセット" onClick="form_reset(1)"></td>
	<td>&nbsp;</td>
	<td align="right">
<!--	<input type="button" value="設定" onClick="set_date()"> -->
	<input type="button" value="保存" onClick="set_cookie()">
	<input type="button" value="スタート" onClick="Start()">
	<input type="button" value="ストップ" onClick="set_stop()">

	<!--	<input type="button" value="URL" onClick="set_url()"> -->
		</td>
	</tr>
</table>
</div>
<div class="box" id="box2">
	<table>
		<tr>
			<td align="center">ワンタッチタイマー</td>
		</tr>
		<tr>
			<td align="center" bgcolor="#FFFF66">
				<input type="button" value="3秒" onClick="ot_timer(3)">
				<input type="button" value="1分" onClick="ot_timer(60)">
				<input type="button" value="3分" onClick="ot_timer(3*60)">
				<input type="button" value="5分" onClick="ot_timer(5*60)">
				<input type="button" value="10分" onClick="ot_timer(10*60)">
				<input type="button" value="15分" onClick="ot_timer(15*60)">
				<input type="button" value="30分" onClick="ot_timer(30*60)">
				<input type="button" value="1時間" onClick="ot_timer(3600)">
				<input type="button" value="2時間" onClick="ot_timer(2*3600)">
			</td>
		</tr>
		
	</table>
</div>
</form>

  
  
  
  
  
  
  
  
  
  <!-- //初めに表示するときの初期の設定をするためのもの　消したら表示できない -->
    <span id="text_bc"></span>
    
  
  


<script type="text/javascript">
//初期設定
//タイマーの更新間隔（1/1000秒）
timer_update = 500;
//タイマーの小数点以下の桁数
timer_fixed = 0;
//cookieの期限日数（予定日時＋期限日数）
c_limit = 0;
//cookie名
c_name = "cdt=";

//始めから表示される文字
cdt_title = "投票締切時間";

//初期値（固定）
//予定日時
timer_count = 0;
d_title = "";
//document.title = d_title;
timerID = -1;
search_b = false; //共有モード
//テキスト
cdt1 = "";
cdt2 = "";
//タイマーモード
t_mode = 0; //0=通常/1=ワンタッチ

//ウィンドウの初期状態を設定
check_focus(1);

//フォーム初期化
form_reset(0);

//タイマーの値を設定する関数
function data(){

        if(window.location.search){
	//検索部の取得
	get_search = document.location.search;
	get_search = get_search.substring(1,get_search.length);
//	if (get_search != "") {

		//共有モード
		search_b = true;
		//検索部取得
		t = get_search.split(",");
		param3 = unescape(decodeURIComponent(t[3]));
//	document.write(param3);



//	}
	//判定処理
	if(param3==0){
        //DBを動かす（"0"）かの判定
	atai = "";
	atai = "C," + (stime / 10000);
	atai += "," + encodeURIComponent(escape(t_title));
	atai += "," + encodeURIComponent(escape(0));
	//飛ばす処理
	document.location.href = "test2.php?" + atai;
       
        }else if(param3==1){
        //DBを止める（"1"）かの判定
	atai = "";
	atai = "C," + (stime / 10000);
	atai += "," + encodeURIComponent(escape(t_title));
	atai += "," + encodeURIComponent(escape(1));
	//飛ばす処理
	document.location.href = "test3.php?" + atai;
       
        }else if(param3==3){
        //タイマースタート
        scntStart();
        
        }else if(param3==4){
        //DBストップ
        Stop();
        }else{
        timerID = setInterval("get_count()",timer_update);
        set_date();
	}

        }
    }
window.onload=data;

function scntStart() {
timerID = setInterval("get_count()",timer_update);
}


function Start() {
set_date();
}


function Stop() {
//文字色
var text_color = "black";
//現在の時間
now = new Date();		
var nt = now.getTime();

//残り時間（1/1000秒→秒単位）
timer_count = ((stime - nt) / 1000);

//タイマーの表示
//タイマーが0秒以上
cdt2 = "" + count_format(timer_count ,0);
//ウィンドウタイトル
if (afocus) document.title = "投票システム";//d_title;
else document.title = "残り時間:" + count_format(timer_count,1);
document.getElementById("cdt_title").innerHTML = cdt1;
document.getElementById("cdt_timer").innerHTML = "<span class='" + text_color + "Text'>" + cdt2 + "</span>";

timer_count = 0;
//タイマー停止
clearInterval(timerID);

}


//カウント開始
//timerID = setInterval("get_count()",timer_update);




function check_focus(num) {
	//ドキュメントがアクティブかどうか
	afocus = (num == 1);
}

function form_reset(num) {
	//num=0 : 起動時
	//num=1 : リセットボタン
	var s,t,n;
	//フォーム初期化
	//再読込
	if (search_b) {
		s = document.location.href;
		n = s.indexOf("?");
		if (n > -1) {
			s = s.substring(0,n);
		}
		document.location.href = s;
	}
	
	//現在の時間
	now = new Date();		

	//現在の時間
	year = now.getFullYear();
	mon = now.getMonth()+1; //１を足すこと
	day = now.getDate();
	hour = now.getHours();
	min = now.getMinutes();

	//初期値
	t_title = mon + "月の終了";
	t_time = year + "/" + (mon + 1) + "/1 00:00";
	sel_alert = 0;
	t_mode = 0;
	
	//検索部の取得
	get_search = document.location.search;
	get_search = get_search.substring(1,get_search.length);
	if (get_search != "") {
		//共有モード
		search_b = true;
		//検索部取得
		t = get_search.split(",");
		t_title = unescape(decodeURIComponent(t[2]));
			t_time = "";
			if (t[0] == "C") {
				if (t_title == "") s = "カウントダウン";
				else s = t_title;
				d_title = s ;
				stime = t[1] * 10000;
				num = 2;
			} else {
				t_mode = eval(t[1]);
			//	d_title = count_format(t_mode,0) + "タイマー";
				num = 3;
			}
			//cookieを読み込まない
	}
	

	//カウンタの最終日時
	ctime = 0;
		
	//cookie読込
	if (num == 0) get_cookie();

	//表題の設定
//	document.form1.text_title.value = t_title;
	get_title();
	
	//告知の設定
//	document.form1.r_alert[sel_alert].checked = true;
	
	if (num < 3) {
		//時間の設定
		get_timer(num);
	} else {
		//検索部読込時
		ot_timer2(t[1]);
	}
	
	get_search = "";
	//タイマー初期化
	format_timer();
}

//タイマーを動かす
function get_count() {
	//文字色
	var text_color = "black";
	//現在の時間
	now = new Date();		
	var nt = now.getTime();
		
	//残り時間（1/1000秒→秒単位）
	timer_count = ((stime - nt) / 1000);
	
	//タイマーの表示
	if (timer_count > -1) {
		//タイマーが0秒以上
		cdt2 = "" + count_format(timer_count ,0);
		//ウィンドウタイトル
		if (afocus) document.title = "投票システム";//d_title;
		else document.title = "残り時間:" + count_format(timer_count,1);

	} else {

			//タイマー停止
			if (timerID > 0) {
				timer_count = 0;
				//タイマー停止
				clearInterval(timerID);
				timerID = 0;
				//アラート
				job_alert();
				
			}
			if(t_title !=""){
			cdt1 = t_title + "の投票を締切りました";
			atai = "";
			atai = "C," + encodeURIComponent(unescape(decodeURIComponent(t[1])));
		     	atai += "," + encodeURIComponent(unescape(decodeURIComponent(cdt1)));
			atai += "," + encodeURIComponent(escape(1));

			//飛ばす処理
			document.location.href = "test3.php?" + atai;

			}else{
			cdt1 = "投票を締切りました";
			atai = "";
			atai = "C," + encodeURIComponent(unescape(decodeURIComponent(t[1])));
		     	atai += "," + encodeURIComponent(unescape(decodeURIComponent(cdt1)));
			atai += "," + encodeURIComponent(escape(1));

			//飛ばす処理
			document.location.href = "test3.php?" + atai;

			}
			cdt2 = "";
		//ウィンドウタイトル
		document.title = "投票システム";
	}
	//画面出力
	document.getElementById("cdt_title").innerHTML = cdt1;
	document.getElementById("cdt_timer").innerHTML = "<span class='" + text_color + "Text'>" + cdt2 + "</span>";
}

function job_alert() {
	//時間告知の仕方
	if (t_title !="") {
		//警告
		alert("「" + t_title + "」の締切時間です");
		//前面
		window.focus();
		//document.focus();
	}else{
	//警告
		alert("投票締切時間です");
		//前面
		window.focus();
		//document.focus();
	}
}

//残り時間の表示する処理
function count_format(sec,mode) {
	//sec=秒数 fix=小数桁数
	//小数点以下の調整
	if (timer_fixed == 0) var sec = Math.ceil(sec);
	var ts = sec.toFixed(timer_fixed);
	var tm = Math.floor(ts / 60); //秒数切り捨て
	ts = ts % 60; //60秒未満の秒数
	var th = Math.floor(tm / 60); //分の切り捨て
	tm = tm % 60; //60分未満の分数
	var td = Math.floor(th / 24); //時間の切り捨て
	th = th % 24; //24時間未満の時間数
	//表示の整形
	//ts = format_num2(ts);
	//tm = format_num2(tm);
	
	var s = "";
	if (mode == 0) {
		if (td > 0) s += td + "日"
		if (th > 0) s += th + "時間"
		if (tm > 0) s += tm + "分"
		if ((s == "") || (ts > 0)) s += ts + "秒"
	} else if (mode == 1) {
		if (td > 0) s += td + "d "
		if (th > 0) s += format_num2(th) + "h "
		if (tm > 0) s += format_num2(tm) + "m "
		if ((s == "") || (ts > 0)) s +=  format_num2(ts) + "s"
	} else {
		if (td > 0) s += td + ":"
		s += format_num2(th) + ":"
		s += format_num2(tm) + ":"
		s += format_num2(ts);
	}
	
	return s;
}


//日にちの設定（format_timer）
function format_timer() {
	var n,s;
	
	//年
	var max = 100;
	document.form1.sel_year.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_year[n].value = year + n;
		document.form1.sel_year[n].text = year + n;
	}
	document.form1.sel_year.value = year;
	
	//月
	var max = 12;
	document.form1.sel_mon.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_mon[n].value = n+1;
		document.form1.sel_mon[n].text = n+1;
	}
	document.form1.sel_mon.value = mon;
	
	//日
	format_timer_day(day);

	//時
	var max = 24;
	document.form1.sel_hour.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_hour[n].value = n;
		document.form1.sel_hour[n].text = format_num2(n);
	}
	
	document.form1.sel_hour.value = hour;

	//分
	var max = 60;
	document.form1.sel_min.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_min[n].value = n;
		document.form1.sel_min[n].text = format_num2(n);
	}
	document.form1.sel_min.value = min;
}


function format_timer_day(gday) {
	//日付のセレクトメニューを設定
	var max = 31;
	
	var gyear = document.form1.sel_year.value;
	var gmon = document.form1.sel_mon.value;
	if (gday == 0) gday = document.form1.sel_day.value;
	
	if (gmon == 2) {
		if ((gyear%4 == 0 && gyear%100 != 0) || (gyear%400 == 0)) {
			//閏年
			max = 29;
		} else {
			//平年
			max = 28;
		}
	} else if (gmon == 4 || gmon == 6 || gmon == 9 || gmon == 11) {
		max = 30;
	}
	
	document.form1.sel_day.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_day[n].value = n+1;
		document.form1.sel_day[n].text = n+1;
	}
	if (day > max) gday = 1;
	document.form1.sel_day.value = gday;
}
function format_num2(num) {
//秒の設定（表示）
	var s = "";
	if (num < 10) s = "0";
	return s + num;
}

function get_timer(num) {
	//日付と時間の設定
	now = new Date();
	
	if (t_time != "") {
		var tt = t_time.split(" ",2);
		var d = tt[0].split("/",3);
		var t = tt[1].split(":",2);
		year = eval(d[0]);
		mon = eval(d[1]);
		day = eval(d[2]);
		hour = eval(t[0]);
		min = eval(t[1]);
	} else {
		if (num == 2) now.setTime(stime);
		//現在の時間
		year = now.getFullYear();
		mon = now.getMonth()+1; //１を足すこと
		day = now.getDate();
		hour = now.getHours();
		min = now.getMinutes();
	}

	set_timer();
}


//タイマーHTMLの表示
function set_timer() {
	//日付と時間の設定
	now = new Date();
	
	//予定時刻
	now.setDate(1);
	now.setYear(year);
	now.setMonth(mon-1);
	now.setDate(day);
	now.setHours(hour);
	now.setMinutes(min);
	now.setSeconds(0);		
	now.setMilliseconds(0);		
	stime = now.getTime();
	
	//alert(now + "\n" + year + "/" + mon + "/" + day);
}

//設定ボタン
function set_stop() {
	//タイマーモード
	t_mode = 0;
	
	//表題
	get_title();

	//日時
	year = document.form1.sel_year.value;
	mon = document.form1.sel_mon.value;
	day = document.form1.sel_day.value;
	hour = document.form1.sel_hour.value;
	min = document.form1.sel_min.value;
	
	//目標時間
	t_time = year + "/" + mon + "/" + day + " " + hour + ":" + min;
	//現在時間
	set_timer();

	
	//検索部準備
	get_search = "C," + (stime / 10000);
	
	if (get_search == "") set_date();

	else get_title();

	atai = "";
	atai = "C," + encodeURIComponent(unescape(decodeURIComponent(t[1])));
     	atai += "," + encodeURIComponent(unescape(decodeURIComponent(t[2])));
	atai += "," + encodeURIComponent(escape(1));
	document.location.href = "?" + atai;

	//タイマー起動
	if (timerID == 0) timerID = setInterval("get_count()",timer_update);
}


//設定ボタン
function set_date() {
	//タイマーモード
	t_mode = 0;
	
	//表題
	get_title();

	//日時
	year = document.form1.sel_year.value;
	mon = document.form1.sel_mon.value;
	day = document.form1.sel_day.value;
	hour = document.form1.sel_hour.value;
	min = document.form1.sel_min.value;
	
	//目標時間
	t_time = year + "/" + mon + "/" + day + " " + hour + ":" + min;
	//現在時間
	set_timer();
	
	//検索部準備
	get_search = "C," + (stime / 10000);
	
	if (get_search == "") set_date();

	else get_title();

	//表題がURLに表示されないように二重化
	get_search += "," + encodeURIComponent(escape(t_title));
	//DB判定の値を入れる(0の場合はDB動く)
	get_search += "," + encodeURIComponent(escape(0));
	//alert(get_search);
	document.location.href = "?" + get_search;

	//タイマー起動
	if (timerID == 0) timerID = setInterval("get_count()",timer_update);
}

function get_title() {
	t_title = document.form1.text_title.value;
	if (t_title == ""){ 
	//タイトルに名前を付ける
		if(d_title !=""){
		t_title = d_title;
		cdt1 = t_title;
		}else{
		t_title = "";
		cdt1 = t_title;
		}
	}else	cdt1 = t_title + "投票締切時間まで";
	document.getElementById("cdt_title").innerHTML = cdt1;
}

//ワンタッチボタン
function ot_timer(gtime) {
	//タイマーモード
	t_mode = gtime;

	//ワンタッチタイマー設定
	ot_timer2(gtime);
	
	
	//検索部準備
	get_search = "T," + gtime;
	//表題表示
//	document.form1.text_title.value = count_format(gtime,0) + "後";
	get_title();
	format_timer();
	
	if (timerID == 0) timerID = setInterval("get_count()",timer_update);
}


//ワンタッチタイマー設定
function ot_timer2(gtime) {
	//日付と時間の設定
	now = new Date();
	
	//予定時刻
	stime = now.getTime() + (gtime * 1000);
	
	//タイマー設定
	now.setTime(stime);
	year = now.getFullYear();
	mon = now.getMonth()+1; //１を足すこと
	day = now.getDate();
	hour = now.getHours();
	min = now.getMinutes();
}

function get_cookie() {
	var c_data;
	var n, m, data
	//保存cookieの読込
	c_data = document.cookie;
	
	//cookie名からデータの切り出し
	n = c_data.indexOf(c_name,0); //*1 
	if (n > -1) {
		//データがあった場合
		m = c_data.indexOf(";", n + c_name.length); //*2
		if (m == -1) m = c_data.length; //*3
		data = c_data.substring(n + c_name.length, m); //*4
	} else {
		//データがなかった場合
		data = ""; //*5
	}

	if (data != "") {
		var t = data.split(",",3);
		t_title = unescape(t[0]);
		t_time = t[1];
		sel_alert = t[2];
	}
}


//保存ボタン
function set_cookie() {
	var c_data,c_date,n,kigen;

	//保存データの準備
	set_date();
	c_data = escape(t_title) + "," + t_time + ",";
	for (n=0;n<document.form1.r_alert.length;n++) {
		if (document.form1.r_alert[n].checked) c_data += n;
	}

	//有効期限
	c_date = new Date();
	n = c_date.getTime() + (60*60*24*c_limit + timer_count)*1000; 
	c_date.setTime(n);
	kigen = c_date.toGMTString();

	//cookieの書き出し
	document.cookie = c_name + c_data + "; expires=" + kigen;
}

//URLボタン
function set_url() {
	if (get_search == "") set_date();
	else get_title();
	//表題がURLに表示されないように二重化
	get_search += "," + encodeURIComponent(escape(t_title));
	//alert(get_search);
	document.location.href = "?" + get_search;
// 	location.href = "test2.php?&" + escape(param1) +"="+ escape(param2);

}

function cntStart(){
get_search = "";
get_search += "," + encodeURIComponent(escape(t_title));
get_search += "," + encodeURIComponent(escape(0));
//飛ばす処理
document.location.href = "?" + get_search;

//  location.href = "isitime.php?&" + escape(document.timer.hun.value) +"="+ escape(document.timer.sec.value) + "="+ escape(0);
Start();
}








</script>
<p class="goBack"><a href="vote_manage.php">戻る</a></p>
</body>
</html>
