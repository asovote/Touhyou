<?php
session_start();
require_once './DbProfile.php';

// 不正なQueryStringsの場合はeditgenre.phpへ
if (empty($_GET['genre']))
  header('Location: ../editgenre.php');

$pdo = new PDO(dbDsn, dbAccount, dbPassword);
$deleteStmt = $pdo->prepare('DELETE FROM janru  WHERE j_id=?');
print_r($deleteStmt);
$deleteStmt->execute(array($_GET['genre']));
$_SESSION['deletedGenre'] = true;
header('Location: ../editgenre.php');

?>
