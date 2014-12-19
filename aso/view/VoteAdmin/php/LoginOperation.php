<?php
session_start();
require_once './DbProfile.php';

// スクリプトの不正な埋め込みを禁止する。
$_POST['userName'] = h($_POST['userName']);
$_POST['password'] = h($_POST['password']);

$pdo = new PDO(dbDsn, dbAccount, dbPassword);
$verifyStmt = $pdo->prepare('SELECT * FROM admin WHERE name = ? and pw = ?');
$verifyStmt->execute(array($_POST['userName'], $_POST['password']));
$result = $verifyStmt->fetch(PDO::FETCH_ORI_FIRST);

// ログインに失敗した場合
if (empty($result))
  header('Location: ../loginerror.php');
else {
  $_SESSION['ad_id'] = $result['ad_id'];
  header('Location: ../genre.php?genre=15');

}
// htmlspecialcharsを簡略化する。
function h($str) {
  return htmlspecialchars($str);
}
?>
