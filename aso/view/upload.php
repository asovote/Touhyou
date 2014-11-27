<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>
<p><?php
session_start();
//$m_id = $_SESSION['m_id'];
$m_id = 1;
require_once('include_path.php');
require_once('db.php');
if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "img/" . $_FILES["upfile"]["name"])) {
    chmod("img/" . $_FILES["upfile"]["name"], 0644);
    echo $_FILES["upfile"]["name"] . "をアップロードしました。";
    $query = "update member set m_img = '" . $_FILES["upfile"]["name"] . "' where m_id = " . $m_id ;
    $result = $dbc -> query($query);
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}

?></p>
</body>
</html>