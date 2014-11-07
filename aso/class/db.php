<?php
//データベースへの接続情報
//ローカル側

define('db_host', 'localhost');
define('db_user', 'root');
define('db_pass', '');
define('db_name', 'test');


//サーバ側
/*
define('db_host', '172.20.17.205');
define('db_user', 'user1');
define('db_pass', '');
define('db_name', 'test');
*/

$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
?>