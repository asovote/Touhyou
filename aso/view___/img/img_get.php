<?php


// DB�ڑ�
$mysqli = new mysqli('localhost', 'root', '');
	if ($mysqli -> connect_errno) {
		print('<p>�f�[�^�x�[�X�ւ̐ڑ��Ɏ��s���܂����B</p>' . $mysqli -> connect_error);
		exit();
	}
	$mysqli -> select_db('test');
	$mysqli -> set_charset("utf-8");
	

// �摜�f�[�^�擾
$query = "SELECT m_img FROM member WHERE m_id = " . $_GET['m_id'] ;


$result = $mysqli -> query($query);
$row = $result -> fetch_row();

echo $row[0];
?>

