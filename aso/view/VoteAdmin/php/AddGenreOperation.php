<?php
require_once './DbProfile.php';
session_start();

// 不正なQueryStringsは許可しない
if (empty($_GET['newGenreName']))
  header('Location: ../editgenre.php');

$pdo = new PDO(dbDsn, dbAccount, dbPassword);
$addGenreStmt = $pdo->prepare('INSERT INTO janru VALUES(?,?,?)');
$addGenreStmt->execute(array("",$_GET['newGenreName'], 0));
$_SESSION['addedGenre'] = true;
header('Location: ../editgenre.php');
?>
