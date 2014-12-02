<?php
printf($k);
$img = "<img src=img/" .$row['m_img']. " width=\"300\" height=\"300\">";
if($row['m_img'] == null){
	echo '画像が登録されていません。';
} else {
	echo $img;
	}	
printf($k);

?>