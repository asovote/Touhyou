<?php
//データベースへの接続情報
//ローカル側
/*
同じディレクトリにdb.iniを作ってください。
例:
host = "localhost"
user = "root"
pass = "password"
name = "database"

これで接続先の設定ができます。
*/
$ini = parse_ini_file("db.ini");

define('db_host', $ini['host']);
define('db_user', $ini['user']);
define('db_pass', $ini['pass']);
define('db_name', $ini['name']);


//$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
?>