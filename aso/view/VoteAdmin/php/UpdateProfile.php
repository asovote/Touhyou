<?php
require_once './DbProfile.php';
session_start();

$pdo = new PDO(dbDsn, dbAccount, dbPassword);

//  
$_POST['name'] = h($_POST['name']);
$_POST['school'] = h($_POST['school']);
$_POST['free'] = h($_POST['free']);
// プロフィール情報を更新する
$profileUpdateStmt = $pdo->prepare('UPDATE member SET name = ?, school = ?, free = ? WHERE m_id = ?');
$profileUpdateStmt->execute(array($_POST['name'], $_POST['school'], $_POST['free'], $_POST['id']));

header('Location: ../updatesuccess.php');
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES,"UTF-8");
}
?>
