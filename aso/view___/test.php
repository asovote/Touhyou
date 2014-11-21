<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Script-Type" CONTENT="text/javascript">
<TITLE>次のページに情報を渡す方法</TITLE>
</HEAD>
<BODY>


<SCRIPT TYPE="text/javascript">

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
	//データベースを動かす判定
	if(param3==0){
            //textBoxの値を代入する（param1の値を分に代入）
  location.href = "test2.php?&" + escape(param1) +"="+ escape(param2);
           }else {
  location.href = "test3.php?&" + escape(param1) +"="+ escape(param2);
           }

        }
    }
    window.onload=data;


</SCRIPT>

<!--
<form name="timer" >

<input type="text" id = "hun" name ="test1" >分
<input type="text" id = "sec" name ="test2">秒<br>
<input type="text" id = "chk" name ="test3">秒<br>
</form>

-->


</BODY>
</HTML